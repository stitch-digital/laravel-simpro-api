<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Suppliers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveSupplier extends Request
{
    public function __construct(protected readonly int $vendorId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/vendors/'.$this->vendorId;
    }

    protected function defaultQuery(): array
    {
        return [
            'display' => 'all',
        ];
    }
}
