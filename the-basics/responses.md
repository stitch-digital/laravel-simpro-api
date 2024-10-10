# Responses

After sending [requests](broken-reference), Saloon has some really helpful features out of the box for dealing with the returned response class, like returning the body in json, getting the header details, returning the status code etc. Simply add a method to the response:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\info\GetInfo;

$simpro = new SimproApiConnector();
$request = new GetInfo();

$response = $simpro->send($request);

return $response->status(); // Returns the response status code
return $response->json(); // Returns a json response body in an array
```

## Useful Methods

Check out the Saloon documentation for a [full list of available response methods](https://docs.saloon.dev/the-basics/responses).
