# Pagination

By default, Simpro paginates requests that can return multiple records. All requests in this package that start with `Get` can be paginated.

To iterate over all pages and return all records, you can use the `collect` method and return a json response:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;

$simpro = new SimproApiConnector();
$request = new GetCustomers();

$results = $simpro->collect($request);

return $results; // returns array of results
```
