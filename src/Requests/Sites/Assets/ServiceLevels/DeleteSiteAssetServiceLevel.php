<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\Assets\ServiceLevels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteSiteAssetServiceLevel extends Request
{
    public function __construct(protected readonly int $serviceLevelId, protected readonly int $assetId, protected readonly int $siteId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/assets/'.$this->assetId.'/serviceLevels/'.$this->serviceLevelId;
    }
}
