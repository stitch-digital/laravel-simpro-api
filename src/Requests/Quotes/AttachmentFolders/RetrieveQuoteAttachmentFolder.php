<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Quotes\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveQuoteAttachmentFolder extends Request
{
    public function __construct(protected int $folderId, protected readonly int $quoteId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/quotes/'.$this->quoteId.'/attachments/folders/'.$this->folderId;
    }
}
