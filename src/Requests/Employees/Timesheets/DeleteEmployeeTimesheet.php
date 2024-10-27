<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\Timesheets;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteEmployeeTimesheet extends Request
{
    public function __construct(protected readonly int $timesheetId, protected readonly int $employeeId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/licenses/'.$this->timesheetId;
    }
}
