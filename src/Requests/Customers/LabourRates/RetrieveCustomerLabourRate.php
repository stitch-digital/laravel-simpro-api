<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\LabourRates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerLabourRate extends Request
{
    public function __construct(protected readonly int $labourRateId, protected readonly int $contractId, protected readonly int $customerId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/labourRates/'.$this->labourRateId;
    }
}
