<?php

namespace StitchDigital\LaravelSimproApi\Requests\Setup\Accounts\CostCentres;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCostCentres extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $costCenterId, protected int $companyId)
    {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/setup/accounts/costCenters/'.$this->costCenterId;
    }
}
