<?php

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
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Enable or disable caching for Simpro GET requests. The cache driver can
    | be set to any of the Laravel cache drivers. The cache expiry time is
    | set in seconds.
    |
    */

    'cache' => [
        'enabled' => true,
        'driver' => 'database',
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
        'enabled' => true,
        'per_second' => 10,
        'driver' => 'database',
        'threshold' => 0.8,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Overrides
    |--------------------------------------------------------------------------
    |
    | Set default values for elements of behaviour globally.
    |
    */

    'global_retries' => 3, // Set to null to disable global retries
    'detect_infinite_loops' => true, // Set to false to disable infinite loop detection
    'default_pagination_limit' => 30, // Set to null to use the Simpro default

];
