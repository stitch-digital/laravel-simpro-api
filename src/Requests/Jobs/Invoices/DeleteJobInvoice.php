<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Jobs\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteJobInvoice extends Request
{
    public function __construct(protected string $invoiceId, protected readonly int $jobId, protected int $companyId)
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
        return '/companies/'.$this->companyId.'/jobs/'.$this->jobId.'/invoices/'.$this->invoiceId;
    }
}
