<?php

namespace StitchDigital\LaravelSimproApi\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Saloon\Http\Faking\MockClient;
use StitchDigital\LaravelSimproApi\LaravelSimproApiServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'StitchDigital\\LaravelSimproApi\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        MockClient::destroyGlobal();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSimproApiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-simpro-api_table.php.stub';
        $migration->up();
        */
    }
}
