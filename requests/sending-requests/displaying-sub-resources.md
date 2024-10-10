# Displaying sub-resources

Some of the Simpro API endpoints have sub-resources. For example, [jobs](../available-requests.md#jobs) contain sections which contain cost centres, etc. You can fetch all of this data in a single request by using the `query` method and adding `display=all`:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\jobs\GetJob;

$simpro = new SimproApiConnector();
$request = new GetJob();

$response = $simpro->send($request);

$request->query()->add("display", "all");
$response = $simpro->send($request);
```
