<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Customers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateCustomer extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $companyId, protected readonly array $data, protected string $type = 'companies', protected bool $site = false)
    {
        //
    }

    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        // If the view parameter is set to true, the endpoint should be different
        if ($this->site) {
            return '/companies/'.$this->companyId.'/customers/'.$this->type.'/?createSite=true';
        } else {
            return '/companies/'.$this->companyId.'/customers/'.$this->type.'/';
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}
