<?php

namespace StitchDigital\LaravelSimproApi\Requests\Info;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCurrentUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/currentUser/';
    }
}
