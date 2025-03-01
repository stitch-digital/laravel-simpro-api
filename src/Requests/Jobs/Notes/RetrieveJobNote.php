<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Notes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrieveJobNote extends Request
{
    public function __construct(protected string $noteId, protected readonly int $jobId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/notes/'.$this->noteId;
    }
}
