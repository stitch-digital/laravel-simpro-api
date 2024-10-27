<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Quotes\Sections\CostCenters\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveQuoteSectionCostCentreTask extends Request
{
    public function __construct(protected readonly int $taskId, protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $quoteId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/quotes/'.$this->quoteId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/tasks/'.$this->taskId;
    }
}
