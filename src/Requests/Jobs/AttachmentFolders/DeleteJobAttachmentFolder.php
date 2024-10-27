<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteJobAttachmentFolder extends Request
{
    public function __construct(protected int $folderId, protected readonly int $jobId, protected readonly int $companyId)
    {
        //
    }

    protected Method $method = Method::DELETE;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/attachments/folders/'.$this->folderId;
    }
}
