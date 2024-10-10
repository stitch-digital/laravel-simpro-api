<?php

namespace StitchDigital\LaravelSimproApi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LaravelSimproApiCommand extends Command
{
    public $signature = 'simpro:install';

    public $description = 'Install the Laravel Simpro API package';

    public function handle(): int
    {
        $this->comment('Publishing configuration...');

        // Publish the config file
        Artisan::call('vendor:publish', [
            '--provider' => 'StitchDigital\\LaravelSimproApi\\LaravelSimproApiServiceProvider',
            '--tag' => 'config',
        ]);

        $this->info('Configuration published.');

        $this->comment('Installation complete.');

        return self::SUCCESS;
    }
}
