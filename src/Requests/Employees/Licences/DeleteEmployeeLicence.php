<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Employees\Licences;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteEmployeeLicence extends Request
{
    public function __construct(protected readonly int $licenceId, protected readonly int $employeeId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/employees/'.$this->employeeId.'/licenses/'.$this->licenceId;
    }
}
