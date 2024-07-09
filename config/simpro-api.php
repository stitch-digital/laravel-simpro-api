<?php

// config for Stitch Digital Limited/LaravelSimproApi

return [

    /*
    |--------------------------------------------------------------------------
    | Simpro Base URL
    |--------------------------------------------------------------------------
    |
    | Set the base URL for the Simpro API. This option is not required when
    | using a multi-tenancy setup, as values are passed in the constructor.
    |
    */

    'base_url' => env('SIMPRO_BASE_URL'),

    /*
    |--------------------------------------------------------------------------
    | Simpro API Key
    |--------------------------------------------------------------------------
    |
    | Set the API key for the Simpro API. This option is not required when
    | using a multi-tenancy setup, as values are passed in the constructor.
    |
    */

    'api_key' => env('SIMPRO_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Configuration
    |--------------------------------------------------------------------------
    |
    | Simpro integration partners can use the Authorisation Code Grant method
    | to authenticate with the Simpro. Credentials would pre-exist in Simpro
    | so your application can be easily enabled by a client. Alternatively,
    | you can manually create your application and retrieve credentials by
    | going to System Setup > API in Simpro and selecting OAuth2 as the
    | authentication method.
    |
     */

    'oauth' => [
        'client_id' => env('SIMPRO_CLIENT_ID'),
        'client_secret' => env('SIMPRO_CLIENT_SECRET'),
        'redirect_uri' => env('SIMPRO_REDIRECT_URI'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Enable or disable caching for Simpro GET requests. The cache driver can
    | be set to any of the Laravel cache drivers. The cache expiry time is
    | set in seconds.
    |
    */

    'cache' => [
        'enabled' => 'true',
        'driver' => config('cache.default', 'database'),
        'expire' => 120,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limit Configuration
    |--------------------------------------------------------------------------
    |
    | Set the rate limit for Simpro requests. The rate limit is set per second
    | and the threshold is the percentage of the rate limit that is accepted.
    | The threshold must be a number between 0 and 1 (e.g. 0.5 for 50%).
    |
    | The default rate limit is as per the Simpro API documentation.
    |
    */

    'rate_limit' => [
        'per_second' => 10,
        'threshold' => 1,
    ],
];
