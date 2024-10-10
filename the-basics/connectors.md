# Connectors

Connectors are classes which define an API integration's properties like its URL and headers. When making requests to the Simpro API, you will first need to select which connector to use.

## Simpro API Connector

The easiest way to connect to the Simpro API is using the Simpro API Connector. You can create your application and retrieve credentials by going to System Setup > API in Simpro and selecting API Key as the authentication method.

### Single Connection

If you are using a single connection, you just need to specify your `SIMPRO_BASE_URL` and `SIMPRO_API_KEY` in the .env as per the [using a single connection instructions](broken-reference).

This will pass the required values to the connector so you just need to create a new connector instance:

```php
use StitchDigital\LaravelSimproApi\SimproApiConnector;

$simpro = new SimproApiConnector();
```

### Multiple Connections

If you are [using multiple connections](broken-reference), you can pass through the base URL and API key as constructor parameters:

```php
use App\Models\User;
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use Illuminate\Support\Facades\Auth;

// Assuming the Simpro credentials are associated with your user model
$user = Auth::user();

// Retrieve Simpro credentials from the user
$credentials = $user->getSimproCredentials();

$simpro = new SimproApiConnector($credentials);
```

For greater flexibility you can also pass the values separately:

```php
use App\Models\Tenant;
use StitchDigital\LaravelSimproApi\SimproApiConnector;
use Illuminate\Support\Facades\Auth;

// Assuming the Simpro credentials are associated with a tenant model
$tenant = Auth::user()->tenant();

// Retrieve Simpro credentials from the user
$baseUrl = $user->getSimproBaseUrl();
$apiKey = $user->getSimproApiKey();

$simpro = new SimproApiConnector($baseUrl, $apiKey);
```

## Simpro OAuth Connector

Simpro integration partners can use the Authorisation Code Grant method to authenticate with the Simpro. Credentials would pre-exist in Simpro  so your application can be easily enabled by a client. Alternatively, you can manually create your application and retrieve credentials by going to System Setup > API in Simpro and selecting OAuth2 as the authentication method.

{% hint style="warning" %}
Please ensure you have followed the instructions for [using multiple connections](broken-reference)
{% endhint %}

### Getting Started

This package doesn't include handling authenticating your users, however we have provided [an example of how this can be configured](broken-reference) using Blade, Livewire or a javascript front end framework, such as Vue or React with Inertia.

{% content-ref url="broken-reference" %}
[Broken link](broken-reference)
{% endcontent-ref %}

### Retrieve OAuth Credentials

To interact with the Simpro API using OAuth2, you’ll first retrieve the necessary credentials from the database. These credentials are stored in the SimproCredential model associated with a tenant or user.

```php
use App\Models\User;
use StitchDigital\LaravelSimproApi\SimproOAuthConnector;
use Illuminate\Support\Facades\Auth;

// Retrieve the authenticated user
$user = Auth::user();

// Retrieve the associated Simpro credentials (assuming user has a `simproCredential` relationship)
$credentials = $user->simproCredential;

if (!$credentials) {
    throw new Exception('No Simpro credentials found for this user.');
}

// Create an instance of the SimproOAuthConnector with the base URL
$simpro = new SimproOAuthConnector($credentials->base_url);
```

### Generate an Authorization URL

You will need to redirect the user to Simpro’s authorization page to initiate the OAuth2 flow.

```php
// Generate the authorization URL
$authorizationUrl = $simpro->getAuthorizationUrl();
return redirect($authorizationUrl);
```

### Handle the callback and create access token

Once the user authorizes the application, Simpro will redirect back to your application with an authorization code. Use this code to create an access token.

```php
use StitchDigital\LaravelSimproApi\SimproOAuthConnector;
use Illuminate\Support\Facades\Auth;

// Retrieve the authenticated user
$user = Auth::user();
$credentials = $user->simproCredential;

$simpro = new SimproOAuthConnector($credentials->base_url);

// Retrieve the authorization code from the request
$code = request('code');

// Create an access token using the authorization code
$authenticator = $simpro->getAccessToken($code);

// Authenticate the connector
$simpro->authenticate($authenticator);

// Store the serialized authenticator in the database for future use
$credentials->update([
    'simpro_authenticator' => $authenticator->serialize(),
]);
```

### Making authenticated API requests

With the SimproOAuthConnector authenticated, you can now make API requests:

```php
$response = $simpro->send(new SomeSimproApiRequest());

// Handle the response as needed - examples provided later in this documentation
```

### Refreshing access tokens

OAuth2 access tokens will eventually expire. You need to refresh the token using the stored refresh token:

```php
use StitchDigital\LaravelSimproApi\SimproOAuthConnector;
use Illuminate\Support\Facades\Auth;
use Saloon\Http\Auth\AccessTokenAuthenticator;

// Retrieve the authenticated user
$user = Auth::user();
$credentials = $user->simproCredential;

// Unserialize the stored authenticator
$authenticator = AccessTokenAuthenticator::unserialize($credentials->simpro_authenticator);

$simpro = new SimproOAuthConnector($credentials->base_url);

// Check if the token is expired and refresh it if necessary
if ($authenticator->hasExpired()) {
    $newAuthenticator = $simpro->refreshAccessToken($authenticator);
    $credentials->update([
        'simpro_authenticator' => $newAuthenticator->serialize(),
    ]);
    $simpro->authenticate($newAuthenticator);
} else {
    $simpro->authenticate($authenticator);
}

// Now you can make authenticated requests
$response = $simpro->send(new SomeSimproApiRequest());
```
