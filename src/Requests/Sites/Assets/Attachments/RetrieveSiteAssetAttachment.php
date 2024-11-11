<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\Assets\Attachments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveSiteAssetAttachment extends Request
{
    public function __construct(protected string $attachmentId, protected readonly int $assetId, protected readonly int $siteId, protected readonly int $companyId, protected bool $view = false)
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
        // If the view parameter is set to true, the endpoint should be different
        if ($this->view) {
            return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/assets/'.$this->assetId.'/attachments/files/'.$this->attachmentId.'/view/';
        } else {
            return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/assets/'.$this->assetId.'/attachments/files/'.$this->attachmentId;
        }
    }
}
