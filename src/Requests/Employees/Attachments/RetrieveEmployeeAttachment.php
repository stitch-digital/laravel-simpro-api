<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\Attachments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveEmployeeAttachment extends Request
{
    public function __construct(protected string $attachmentId, protected readonly int $employeeId, protected int $companyId, protected bool $view = false)
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
            return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/attachments/files/'.$this->attachmentId.'/view/';
        } else {
            return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/attachments/files/'.$this->attachmentId;
        }
    }
}
