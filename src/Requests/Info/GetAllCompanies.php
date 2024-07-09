<?php

namespace StitchDigital\LaravelSimproApi\Requests\Info;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllCompanies extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/companies/';
    }
}
