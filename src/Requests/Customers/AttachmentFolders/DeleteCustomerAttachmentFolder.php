<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers\AttachmentFolders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteCustomerAttachmentFolder extends Request
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected string $folderId, protected readonly int $customerId, protected readonly int $companyId)
    {
        //
    }

    protected Method $method = Method::DELETE;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/customers/'.$this->customerId.'/attachments/folders/'.$this->folderId;
    }
}
