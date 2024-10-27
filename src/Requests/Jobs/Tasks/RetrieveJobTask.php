<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Tasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobTask extends Request
{
    public function __construct(protected int $taskId, protected readonly int $jobId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/tasks/'.$this->taskId;
    }
}
