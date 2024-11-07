<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Contractors;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteContractor extends Request
{
    public function __construct(protected readonly int $contractorId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/contractors/'.$this->contractorId;
    }
}
