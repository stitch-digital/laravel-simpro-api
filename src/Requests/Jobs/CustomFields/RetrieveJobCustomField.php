<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobCustomField extends Request
{
    public function __construct(protected readonly int $customFieldId, protected readonly int $jobId, protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/customFields/'.$this->customFieldId;
    }
}
