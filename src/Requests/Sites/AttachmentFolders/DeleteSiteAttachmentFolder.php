<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteSiteAttachmentFolder extends Request
{
    public function __construct(protected readonly string $folderId, protected readonly int $siteId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/attachments/folders/'.$this->folderId;
    }
}