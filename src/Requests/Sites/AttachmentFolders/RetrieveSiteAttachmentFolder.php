<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveSiteAttachmentFolder extends Request
{
    public function __construct(protected int $folderId, protected readonly int $siteId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/attachments/folders/'.$this->folderId;
    }
}
