# Attachments

All attachment endpoints fetch the default Simpro response, however you can also retrieve the file in Base64 format or access a view route.

## Getting the Base64 File

You can simply add the `withBase64` method to the request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\attachments\files\GetCustomerAttachments;

$simpro = new SimproApiConnector();
$request = new GetCustomerAttachments(companyId: 2, customerId: 1, fileId: 100);

$request->withBase64();

$response = $simpro->send($request);

return $response->json();
```

## View the File

To access the view route for the file, you can add the `view` method to the request:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use StitchDigital\LaravelSimproApi\Requests\customers\attachments\files\GetCustomerAttachments;

$simpro = new SimproApiConnector();
$request = new GetCustomerAttachments(companyId: 2, customerId: 1, fileId: 100);

$request->view();

$response = $simpro->send($request);

return $response->body();
```
