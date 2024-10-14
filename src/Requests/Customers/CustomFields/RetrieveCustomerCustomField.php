<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerCustomField extends Request
{
    public function __construct(protected readonly int $customFieldId, protected readonly int $customerId, protected readonly int $companyId)
    {
        //
    }

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/customFields/'.$this->customFieldId;
    }
}
