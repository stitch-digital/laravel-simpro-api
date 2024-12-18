<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Sections\CostCenters\Assets;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateJobSectionCostCenterAsset extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $costCenterId, protected readonly int $sectionId, protected readonly int $jobId, protected readonly int $companyId, protected readonly array $data)
    {
        //
    }

    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/sections/'.$this->sectionId.'/costCenters/'.$this->costCenterId.'/assets/';
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}
