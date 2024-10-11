<?php

namespace StitchDigital\LaravelSimproApi\Requests\Setup\StatusCodes\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveProjectStatusCodes extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $statusCodeId, protected int $companyId)
    {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/' . $this->companyId . '/setup/statusCodes/projects/' . $this->statusCodeId;
    }
}
