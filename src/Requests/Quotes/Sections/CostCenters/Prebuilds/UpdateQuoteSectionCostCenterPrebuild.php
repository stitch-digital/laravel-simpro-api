<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Quotes\Sections\CostCenters\Prebuilds;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateQuoteSectionCostCenterPrebuild extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $prebuildId, protected string $costCenterId, protected string $sectionId, protected readonly int $quoteId, protected readonly int $companyId, protected readonly array $data)
    {
        //
    }

    protected Method $method = Method::PATCH;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/quotes/'.$this->quoteId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/prebuilds/'.$this->prebuildId;
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}
