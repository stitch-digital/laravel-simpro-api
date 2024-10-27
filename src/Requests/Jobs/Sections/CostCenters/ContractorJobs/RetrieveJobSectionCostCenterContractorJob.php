<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\ContractorJobs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobSectionCostCenterContractorJob extends Request
{
    public function __construct(protected readonly int $contractorJobId, protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $jobId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/contractorJobs/'.$this->contractorJobId;
    }
}
