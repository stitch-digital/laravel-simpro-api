<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\PreferredTechnicians;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveSitePreferredTechnician extends Request
{
    public function __construct(protected int $technicianId, protected readonly int $siteId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/preferredTechnicians/'.$this->technicianId;
    }
}
