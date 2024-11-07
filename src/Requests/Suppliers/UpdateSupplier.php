<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Suppliers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateSupplier extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $vendorId, protected readonly int $companyId, protected readonly array $data)
    {
        //
    }

    protected Method $method = Method::PATCH;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/vendors/'.$this->vendorId;
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}