<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Setup\LaborRates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteLaborRate extends Request
{
    public function __construct(protected readonly int $laborRateId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/setup/labor/laborRates/'.$this->laborRateId;
    }
}
