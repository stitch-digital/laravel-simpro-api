<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Quotes\Sections\CostCenters\Schedules;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetQuoteSectionCostCentreSchedules extends Request implements Paginatable
{
    public function __construct(protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $quoteId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/quotes/'.$this->quoteId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/schedules/';
    }
}
