<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\CustomerAssets;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerAsset extends Request
{
    public function __construct(protected readonly int $customerAssetId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/customerAssets/'.$this->customerAssetId;
    }
}
