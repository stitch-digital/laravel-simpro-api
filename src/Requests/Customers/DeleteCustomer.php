<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCustomer extends Request
{
    public function __construct(protected readonly int $customerId, protected readonly int $companyId, protected string $type = 'companies',)
    {
        //
    }

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::DELETE;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/customers/'.$this->type.'/'.$this->customerId;
    }
}
