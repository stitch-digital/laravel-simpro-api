<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\Notes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCustomerNote extends Request
{
    public function __construct(protected readonly int $noteId, protected readonly int $customerId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/notes/'.$this->noteId;
    }
}
