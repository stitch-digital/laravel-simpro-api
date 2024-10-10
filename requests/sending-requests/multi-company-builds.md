# Multi-Company Builds

Most Simpro builds are for a single company. The company id for single-company builds is 0. By default, any requests that require a company ID will use 0 unless a company ID is specified in the request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\GetCustomers;

$simpro = new SimproApiConnector();

$request = new GetCustomers(); // Uses the default company ID 0
$requestWithCompanyId = new GetCustomers(companyId: 2); // Uses company ID 2

$response = $simpro->send($request);

return $response->json();
```

You can easily determine if a Simpro build is using multi-company by using the `GetInfo` request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\info\GetInfo;

$simpro = new SimproApiConnector();

$request = new GetInfo();
$request->query()->add("columns", "MultiCompany");

$response = $simpro->send($request);

return $response->json()["MultiCompany"];

// Example Response:
true
```
