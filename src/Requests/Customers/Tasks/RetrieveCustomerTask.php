<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerTask extends Request
{
    public function __construct(protected readonly int $taskId, protected readonly int $customerId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/tasks/'.$this->taskId;
    }
}
