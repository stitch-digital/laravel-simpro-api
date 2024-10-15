<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\Contracts\ServiceLevels\AssetTypes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerContractCustomField extends Request
{
    public function __construct(protected readonly int $assetTypeId, protected readonly int $serviceLevelId, protected readonly int $contractId, protected readonly int $customerId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/contracts/'.$this->contractId.'/serviceLevels/'.$this->serviceLevelId.'/assetTypes/'.$this->assetTypeId;
    }
}