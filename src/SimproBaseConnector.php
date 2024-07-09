<?php

namespace StitchDigital\LaravelSimproApi;

use Exception;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

abstract class SimproBaseConnector extends Connector implements HasPagination
{
    use AcceptsJson;
    use HasRateLimits;
    use AlwaysThrowOnErrors;

    public string $baseUrl;
    public ?string $clientId;
    public ?string $clientSecret;
    public ?string $redirectUri;
    public ?string $apiKey;

    /**
     * @throws Exception
     */
    public function __construct(array $config = [])
    {
        $this->baseUrl = $config['base_url'] ?? config('simpro-api.base_url');
        $this->clientId = $config['client_id'] ?? config('simpro-api.oauth.client_id');
        $this->clientSecret = $config['client_secret'] ?? config('simpro-api.oauth.client_secret');
        $this->redirectUri = $config['redirect_uri'] ?? config('simpro-api.oauth.redirect_uri');
        $this->apiKey = $config['api_key'] ?? config('simpro-api.api_key');

        $this->validateConfiguration();
    }

    /**
     * The Base URL of the API.
     * @throws Exception
     */
    protected function validateConfiguration(): void
    {
        if (!$this->baseUrl) {
            throw new Exception('Simpro configuration error: Base URL not set');
        }
    }

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl . '/api/v1.0';
    }

    protected function resolveLimits(): array
    {
        return [
            Limit::allow(
                config('simpro-api.rate_limit.per_second'),
                threshold: config('simpro-api.rate_limit.threshold')
            )->everySeconds(1)->sleep(),
        ];
    }

    /**
     * Resolve the rate limit store from the configuration.
     *
     * @return RateLimitStore
     */
    protected function resolveRateLimitStore(): RateLimitStore
    {
        return new LaravelCacheStore(Cache::store(config('simpro-api.cache.driver')));
    }

    /**
     * Get the prefix for the rate limiter.
     * This prefix is used to store the rate limit data in the cache.
     * Simpro Rate Limits are associated to each client build URL
     * endpoint, so we use the base URL as the prefix.
     *
     * @return string|null
     */
    protected function getLimiterPrefix(): ?string
    {
        return 'simpro-api-' . $this->baseUrl;
    }

    /**
     * Implement the paginate method from the HasPagination interface.
     *
     * @param Request $request
     * @return PagedPaginator
     */
    public function paginate(Request $request): PagedPaginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected function isLastPage(Response $response): bool
            {
                $currentPage = $this->currentPage;
                $totalPages = (int) $response->header('Result-Pages');

                return $currentPage >= $totalPages;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json();
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->add('page', $this->currentPage);

                if (isset($this->perPageLimit)) {
                    $request->query()->add('pageSize', $this->perPageLimit);
                }

                return $request;
            }
        };
    }
}
