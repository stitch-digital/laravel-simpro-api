# Sending Requests

To start sending requests, instantiate your connector and use the `send` method. This method accepts a request class.

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\info\GetInfo;

$simpro = new SimproApiConnector();
$request = new GetInfo();

$response = $simpro->send($request);
```

## Request Naming Convention

All requests have prefixes based on the kind of action they perform:

<table><thead><tr><th width="181">Prefix</th><th>Action</th></tr></thead><tbody><tr><td>Get...</td><td>Get all records</td></tr><tr><td>Retrieve...</td><td>Retrieve a specific record</td></tr><tr><td>Create...</td><td>Create a new record</td></tr><tr><td>Update...</td><td>Update an existing record</td></tr><tr><td>Delete...</td><td>Delete an existing record</td></tr></tbody></table>

## Sending Body Data

When using requests that create or update records in Simpro using **POST, PUT or PATCH** methods, you will need to send data in the body of the request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\jobs\CreateJob;

$simpro = new SimproApiConnector();

$request = new CreateJob(
  data: [
    "Type" => "Service",
    "Site" => 67890,
    "Customer" => 12345,
    "Name" => "New Job"
  ]
);

$response = $simpro->send($request);

return $response->json();
```

{% hint style="info" %}
In an effort to keep this package flexible and easy to maintain, we have not build [Data Transfer Objects](https://docs.saloon.dev/digging-deeper/data-transfer-objects) for body data. You are able to build these yourself if you prefer. If you are not using DTOs, then ensure you consult the [Simpro API docs](https://developer.simprogroup.com/apidoc/?page=57be307ee1bd93b729fdc4c13f15e201) to ensure you send the correct body data with your requests.
{% endhint %}

## Headers

We already have the default headers covered so that you can send requests right away. However Simpro has some useful features to make your integration more meaningful, like the ability to [fetch only modified resources](fetching-only-modified-records.md) on most of their endpoints.

To send additional headers with your request, you can use the `headers` method on a request instance:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\info\GetInfo;

$simpro = new SimproApiConnector();
$request = new GetInfo();

$request->headers()->add($key, $value); // replace $key and $value as required

$response = $simpro->send($request);
```

## Query Parameters

Many of the Simpro API endpoints have optional query parameters that are appended to the URL, for example returning only specified columns, [displaying sub-resources](displaying-sub-resources.md) or ordering the requested records.

To add query parameters to your request, you can use the `query` method on a request instance:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\info\GetInfo;

$simpro = new SimproApiConnector();
$request = new GetInfo();

$response = $simpro->send($request);

// Original Response:

{
  "Version": "99.0.0.0.1.1",
  "Country": "Australia",
  "MaintenancePlanner": true,
  "MultiCompany": true,
  "SharedCatalog": true,
  "SharedStock": true,
  "SharedClients": true,
  "SharedSetup": true,
  "SharedDefaults": true,
  "SharedAccountsIntegration": true,
  "SharedVoip": true
}

// Let's add a query:

$request->query()->add("columns", "Version,Country");
$response = $simpro->send($request);

// Updated Response:

{
  "Version": "99.0.0.0.1.1",
  "Country": "Australia"
}
```

## Asynchronous Requests

This package is built using Saloon, which allows for [sending asynchronous requests](https://docs.saloon.dev/the-basics/sending-requests#asynchronous-requests) as well as many other really useful features for working with APIs.
