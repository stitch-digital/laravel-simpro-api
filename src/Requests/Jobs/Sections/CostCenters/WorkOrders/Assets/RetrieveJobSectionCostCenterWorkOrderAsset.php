<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\WorkOrders\Assets;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobSectionCostCenterWorkOrderAsset extends Request
{
    public function __construct(protected readonly int $assetId, protected readonly int $workOrderId, protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $jobId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/workOrders/'.$this->workOrderId.'/assets/'.$this->assetId;
    }
}
