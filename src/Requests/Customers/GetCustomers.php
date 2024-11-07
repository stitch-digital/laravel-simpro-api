<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetCustomers extends Request implements Paginatable
{
    public function __construct(protected readonly int $companyId, protected string $type = 'all')
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
         if ($this->type == 'companies') {

            return '/companies/' . $this->companyId . '/customers/companies';

        } else if ($this->type == 'individuals') {

             return '/companies/' . $this->companyId . '/customers/individuals';

        } else {

            return '/companies/' . $this->companyId . '/customers/';

        }
    }
}
