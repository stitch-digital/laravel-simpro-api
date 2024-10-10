<?php

namespace StitchDigital\LaravelSimproApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StitchDigital\LaravelSimproApi\Commands\LaravelSimproApiCommand;

class LaravelSimproApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-simpro-api')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_simpro_api_table')
            ->hasCommand(LaravelSimproApiCommand::class);
    }
}
