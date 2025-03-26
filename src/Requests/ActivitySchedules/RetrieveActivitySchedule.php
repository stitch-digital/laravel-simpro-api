<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\ActivitySchedules;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveActivitySchedule extends Request
{
    public function __construct(protected readonly int $scheduleId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/activitySchedules/'.$this->$scheduleId;
    }
}
