<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobSectionCostCentreTask extends Request
{
    public function __construct(protected readonly int $taskId, protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $jobId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/tasks/'.$this->taskId;
    }
}
