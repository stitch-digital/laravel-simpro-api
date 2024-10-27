<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Quotes\Attachments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteQuoteAttachment extends Request
{
    public function __construct(protected string $attachmentId, protected readonly int $quoteId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/quotes/'.$this->quoteId.'/attachments/files/'.$this->attachmentId;
    }
}
