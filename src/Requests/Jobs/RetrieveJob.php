<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJob extends Request
{
    public function __construct(protected readonly int $jobId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId;
    }

    protected function defaultQuery(): array
    {
        return [
            'display' => 'all',
        ];
    }
}
