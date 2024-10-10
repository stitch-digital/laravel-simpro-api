# Available Requests

Full information on the available endpoints from Simpro's API can be found on their [developer center documentation](https://developer.simprogroup.com/apidoc/?page=57be307ee1bd93b729fdc4c13f15e201), which also has a Swagger / OpenAPI specification that can be downloaded and used with tools like Postman.

All requests are located in the `StitchDigital\LaravelSimproApi\Requests\` directory. This directory holds many subdirectories of requests. If you need to customise the behaviour of a request, you can create your own request class and extend the request you wish to modify.

We don't recommend publishing these requests to your project, as you will then become responsible for maintaining them - the idea is that this package removes that burden. However, if you still want to publish the requests you can do so by running this artisan command:

```php
php artisan vendor:publish --tag=laravel-simpro-api-requests
```

## Full list of available requests:

<details>

<summary>🗂️ accounts/</summary>



</details>

<details>

<summary>🗂️ activitySchedules/</summary>



</details>

<details>

<summary>🗂️ catalogGroups/</summary>



</details>

<details>

<summary>🗂️ catalogs/</summary>



</details>

<details>

<summary>🗂️ companies/</summary>

* [GetAllCompanies](https://developer.simprogroup.com/apidoc/?page=edefbda3a2bdd979e42d8944b7325b79#operation/280504eb9a1a7ebae0495c7a556db50e)
* [GetCompany](https://developer.simprogroup.com/apidoc/?page=edefbda3a2bdd979e42d8944b7325b79#operation/2f1b600f5834798247a53cc22aebfbc5)
* [UpdateCompany](https://developer.simprogroup.com/apidoc/?page=edefbda3a2bdd979e42d8944b7325b79#operation/1a5b55a5be6a01c50efb03a59837803d)

</details>

<details>

<summary>🗂️ contacts/</summary>

* `GetContacts`
* `RetrieveContact`
* `UpdateContact`
* `CreateContact`
* `DeleteContact`

</details>

<details>

<summary>🗂️ contractorInvoices/</summary>



</details>

<details>

<summary>🗂️ contractorJobs/</summary>



</details>

<details>

<summary>🗂️ contractors/</summary>



</details>

<details>

<summary>🗂️ contractorVariances/</summary>



</details>

<details>

<summary>🗂️ creditNotes/</summary>



</details>

<details>

<summary>🗂️ currentUser/</summary>



</details>

<details>

<summary>🗂️ customerAssets/</summary>



</details>

<details>

<summary>🗂️ customerContracts/</summary>



</details>

<details>

<summary>🗂️ customerInvoices/</summary>



</details>

<details>

<summary>🗂️ customerPayments/</summary>



</details>

<details>

<summary>🗂️ customers/</summary>



</details>

<details>

<summary>🗂️ employees/</summary>



</details>

<details>

<summary>🗂️ info/</summary>

* `GetInfo`

</details>

<details>

<summary>🗂️ inventoryJournals/</summary>



</details>

<details>

<summary>🗂️ invoices/</summary>



</details>

<details>

<summary>🗂️ iot/</summary>



</details>

<details>

<summary>🗂️ iotEmployees/</summary>



</details>

<details>

<summary>🗂️ iotjob/</summary>



</details>

<details>

<summary>🗂️ jobCostCenters/</summary>



</details>

<details>

<summary>🗂️ jobs/</summary>



</details>

<details>

<summary>🗂️ jobWorkOrders/</summary>



</details>

<details>

<summary>🗂️ leads/</summary>



</details>

<details>

<summary>🗂️ logs/</summary>



</details>

<details>

<summary>🗂️ notes/</summary>



</details>

<details>

<summary>🗂️ plantTypes/</summary>



</details>

<details>

<summary>🗂️ prebuildGroups/</summary>



</details>

<details>

<summary>🗂️ quoteCostCenters/</summary>



</details>

<details>

<summary>🗂️ quotes/</summary>



</details>

<details>

<summary>🗂️ quoteWorkOrders/</summary>



</details>

<details>

<summary>🗂️ recurringInvoiceCostCenters/</summary>



</details>

<details>

<summary>🗂️ recurringInvoices/</summary>



</details>

<details>

<summary>🗂️ recurringJobCostCenters/</summary>



</details>

<details>

<summary>🗂️ recurringJobs/</summary>



</details>

<details>

<summary>🗂️ reports/</summary>



</details>

<details>

<summary>🗂️ schedules/</summary>



</details>

<details>

<summary>🗂️ setup/</summary>

🗂️ **defaults/**

* `RetrieveCompanyDefaultSettings`

</details>

<details>

<summary>🗂️ sites/</summary>

* `GetSites`
* `RetrieveSite`
* `UpdateSite`
* `CreateSite`
* `DeleteSite`

🗂️ **contacts/**

* `GetSiteContacts`
* `RetrieveSiteContact`
* `UpdateSiteContact`
* `CreateSiteContact`
* `DeleteSiteContact`

</details>

<details>

<summary>🗂️ staff/</summary>



</details>

<details>

<summary>🗂️ stockTransfer/</summary>



</details>

<details>

<summary>🗂️ storageDevices/</summary>



</details>

<details>

<summary>🗂️ takeOffTemplateGroups/</summary>



</details>

<details>

<summary>🗂️ takeOffTemplates/</summary>



</details>

<details>

<summary>🗂️ tasks/</summary>



</details>

<details>

<summary>🗂️ vendorCredits/</summary>



</details>

<details>

<summary>🗂️ vendorOrders/</summary>



</details>

<details>

<summary>🗂️ vendorQuotes/</summary>



</details>

<details>

<summary>🗂️ vendorReceipts/</summary>



</details>

<details>

<summary>🗂️ vendors/</summary>



</details>
