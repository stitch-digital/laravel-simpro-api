<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Info;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetInfo extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/info/';
    }
}
