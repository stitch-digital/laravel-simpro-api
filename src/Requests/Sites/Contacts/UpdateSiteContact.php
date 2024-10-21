<?php

declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Requests\Sites\Attachments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateSiteContact extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected readonly int $contactId, protected readonly int $siteId, protected readonly int $companyId, protected readonly array $data)
    {
        //
    }

    protected Method $method = Method::PATCH;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/companies/'.$this->companyId.'/sites/'.$this->siteId.'/contacts/'.$this->contactId;
    }

    /**
     * @return array<string, mixed>
     */
    public function defaultBody(): array
    {
        return $this->data;
    }
}
