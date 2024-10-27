<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveEmployeeCustomField extends Request
{
    public function __construct(protected readonly int $customFieldId, protected readonly int $employeeId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/customFields/'.$this->customFieldId;
    }
}
