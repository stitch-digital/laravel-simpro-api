<?php

namespace StitchDigital\LaravelSimproApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StitchDigital\LaravelSimproApi\Commands\LaravelSimproApiCommand;

class LaravelSimproApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-simpro-api')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_simpro_credentials_table')
            ->hasCommand(LaravelSimproApiCommand::class);
    }

    public function packageBooted(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simpro-api.php', 'simpro-api');
    }
}
