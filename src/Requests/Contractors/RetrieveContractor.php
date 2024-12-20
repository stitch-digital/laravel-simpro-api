<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Contractors;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveContractor extends Request
{
    public function __construct(protected readonly int $contractorId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/contractors/'.$this->contractorId;
    }

    protected function defaultQuery(): array
    {
        return [
            'display' => 'all',
        ];
    }
}
