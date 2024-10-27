<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\Attachments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteEmployeeAttachment extends Request
{
    public function __construct(protected string $attachmentId, protected readonly int $employeeId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/attachments/files/'.$this->attachmentId;
    }
}
