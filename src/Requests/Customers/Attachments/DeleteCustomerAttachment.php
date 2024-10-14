<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\Attachments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCustomerAttachment extends Request
{
    public function __construct(protected int $attachmentId, protected readonly int $customerId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/attachments/files/'.$this->attachmentId;
    }
}
