<?php

namespace StitchDigital\LaravelSimproApi\Requests\Info;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCompanyDefaultSettings extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $companyId)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/companies/' . $this->companyId . '/setup/defaults/';
    }
}
