<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveSite extends Request
{
    public function __construct(protected readonly int $siteId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId;
    }
}
