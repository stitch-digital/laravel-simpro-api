# Fetching only modified records

The vast majority of the Simpro API endpoints support the If-Modified-Since header, which will filter the responses for only records modified since a specified date and time.

This is really useful for ensuring you only retrieve the necessary data, which can also reduce the amount of processing your Laravel application is required to do with each response.

## Add the header to your request

There are several ways you can utilise this in your application, the most simple being to just add the header to your request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;

$simpro = new SimproApiConnector();
$request = new GetCustomers();

$lastModified = "Wed, 18 Aug 2021 15:09:00 GMT";

$request->headers()->add("If-Modified-Since", $lastModified);

$response = $simpro->send($request);

return $response->json();
```

## Converting a timestamp

The last modified date and time needs to be an RFC 7231 formatted string. You can easily convert a timestamp field from your database using Carbon:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;
use Carbon\Carbon;

$simpro = new SimproApiConnector();
$request = new GetCustomers();

$timestamp = '2021-08-18 15:09:00';

$lastModified = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);

$request->headers()->add("If-Modified-Since", $lastModified);

$response = $simpro->send($request);

return $response()->json();
```

## Using the date of the last request

The data and time of the most recent request you made to an endpoint is returned in the header Date of the response.

This can be used for the next request's `If-Modified-Since` header. You can get the header date as follows:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;

$simpro = new SimproApiConnector();
$request = new GetCustomers();

$response = $simpro->send($request);

return $response->header("Date"); // returns RFC 7231 formatted string

// This can now be used in the next request

$simpro = new SimproApiConnector();
$request = new GetCustomers();

$request->headers()->add("If-Modified-Since", $date);

$response = $simpro->send($request);

return $response->json();
```

The date of the last response can be stored in your database or in the cache. An example of using the cache:

```php
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;

$simpro = new SimproApiConnector();
$request = new GetCustomers();

// Generate a unique cache key for this endpoint
$cacheKey = 'simpro_if_modified_since_' . Str::slug($simpro->baseUrl() . $request->resolveEndpoint());

// Check if the cache contains the 'If-Modified-Since' date for this request
if (Cache::has($cacheKey)) {
    $ifModifiedSince = Cache::get($cacheKey);
    $request->headers()->add('If-Modified-Since', $ifModifiedSince);
}

// Send the request
$response = $simpro->send($request);

// Store the 'Date' header in the cache if the request was successful
if ($response->successful() && $response->header('Date')) {
    Cache::put($cacheKey, $response->header('Date'));
}

// Handle the response (for example, return it as JSON)
return $response->json();
```

Of course, you would likely rather extract this logic into a reusable service or action class rather than duplicate this for each request - but it is a useful way to manage retrieving new data.
