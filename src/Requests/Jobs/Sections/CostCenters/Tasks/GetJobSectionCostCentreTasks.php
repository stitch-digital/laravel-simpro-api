<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetJobSectionCostCentreTasks extends Request implements Paginatable
{
    public function __construct(protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $jobId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/tasks/';
    }
}
