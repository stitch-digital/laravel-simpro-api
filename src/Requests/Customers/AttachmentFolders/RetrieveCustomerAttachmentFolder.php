<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveCustomerAttachmentFolder extends Request
{
    public function __construct(protected string $folderId, protected readonly int $customerId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/attachments/folders/'.$this->folderId;
    }
}
