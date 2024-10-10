<?php

namespace StitchDigital\LaravelSimproApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \StitchDigital\LaravelSimproApi\LaravelSimproApi
 */
class Simpro extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \StitchDigital\LaravelSimproApi\LaravelSimproApi::class;
    }
}
