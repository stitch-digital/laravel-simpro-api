<?php

namespace StitchDigital\LaravelSimproApi\Requests\People\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllCustomers extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $companyId)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/companies/' . $this->companyId;
    }
}
