<?php

namespace StitchDigital\LaravelSimproApi;

use Exception;
use Saloon\Http\Auth\TokenAuthenticator;

class SimproApiConnector extends SimproBaseConnector
{

    public string $baseUrl;
    public ?string $clientId;
    public ?string $clientSecret;
    public ?string $redirectUri;
    public ?string $apiKey;

    public function __construct(array $config)
    {
        parent::__construct($config);

        $this->validateOAuthConfiguration();
    }

    /**
     * @throws Exception
     */
    protected function validateOAuthConfiguration(): void
    {
        if (!$this->apiKey) {
            throw new Exception('Simpro API configuration error: API Key not set');
        }
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->apiKey);
    }
}
