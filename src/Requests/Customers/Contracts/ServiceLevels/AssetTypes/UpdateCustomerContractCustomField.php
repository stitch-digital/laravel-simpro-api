<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\Contracts\ServiceLevels\AssetTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCustomerContractCustomField extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $assetTypeId, protected readonly int $serviceLevelId, protected readonly int $contractId, protected readonly int $customerId, protected readonly int $companyId, protected readonly array $data)
    {
        //
    }

    protected Method $method = Method::PATCH;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/contracts/'.$this->contractId.'/serviceLevels/'.$this->serviceLevelId.'/assetTypes/'.$this->assetTypeId;
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}
