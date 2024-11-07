<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\Catalogue;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteJobSectionCostCenterCatalogue extends Request
{
    public function __construct(protected readonly int $catalogId, protected string $costCenterId, protected string $sectionId, protected readonly int $jobId, protected int $companyId)
    {
        //
    }

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::DELETE;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/catalogs/'.$this->catalogId;
    }
}