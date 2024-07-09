<?php

namespace StitchDigital\LaravelSimproApi;

use Exception;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;

class SimproOAuthConnector extends SimproBaseConnector
{
    use AuthorizationCodeGrant;

    public string $baseUrl;
    public ?string $clientId;
    public ?string $clientSecret;
    public ?string $redirectUri;

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'base_url' => config('simpro-api.base_url'),
            'client_id' => config('simpro-api.oauth.client_id'),
            'client_secret' => config('simpro-api.oauth.client_secret'),
            'redirect_uri' => config('simpro-api.oauth.redirect_uri')
        ], $config);

        parent::__construct($config);

        $this->validateOAuthConfiguration();
    }

    /**
     * @throws Exception
     */
    protected function validateOAuthConfiguration(): void
    {
        if (!$this->clientId) {
            throw new Exception('Simpro OAuth configuration error: Client ID not set');
        }

        if (!$this->clientSecret) {
            throw new Exception('Simpro OAuth configuration error: Client Secret not set');
        }

        if (!$this->redirectUri) {
            throw new Exception('Simpro OAuth configuration error: Redirect URI not set');
        }
    }
    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId($this->clientId)
            ->setClientSecret($this->clientSecret)
            ->setRedirectUri($this->redirectUri)
            ->setDefaultScopes([]) // Simpro does not use the scope parameter
            ->setAuthorizeEndpoint($this->baseUrl . '/oauth2/login?client_id=' . $this->clientId)
            ->setTokenEndpoint($this->baseUrl . '/oauth2/token')
            ->setUserEndpoint('user');
    }
}
