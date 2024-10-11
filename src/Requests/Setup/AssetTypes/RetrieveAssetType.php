<?php

namespace App\Http\Integrations\Simpro\Requests\Setup\AssetTypes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveAssetType extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $assetTypeId, protected int $companyId)
    {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/' . $this->companyId . '/setup/assetTypes/' . $this->assetTypeId;
    }
}
