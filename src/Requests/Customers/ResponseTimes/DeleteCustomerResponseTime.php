<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\ResponseTimes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCustomerResponseTime extends Request
{
    public function __construct(protected readonly int $responseTimeId, protected readonly int $customerId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/responseTimes/'.$this->responseTimeId;
    }
}
