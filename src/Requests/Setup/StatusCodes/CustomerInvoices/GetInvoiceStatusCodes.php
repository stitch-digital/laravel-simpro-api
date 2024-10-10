<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Setup\StatusCodes\CustomerInvoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetInvoiceStatusCodes extends Request implements Paginatable
{
    public function __construct(protected readonly int $companyId)
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
        return '/companies/'.$this->companyId.'/setup/statusCodes/customerInvoices/';
    }
}
