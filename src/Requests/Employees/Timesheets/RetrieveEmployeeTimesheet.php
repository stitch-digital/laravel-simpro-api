<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\Timesheets;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveEmployeeTimesheet extends Request
{
    public function __construct(protected readonly int $timesheetId, protected readonly int $employeeId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/timesheets/'.$this->timesheetId;
    }
}
