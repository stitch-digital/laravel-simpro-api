<?php

namespace StitchDigital\LaravelSimproApi\Commands;

use Illuminate\Console\Command;

class LaravelSimproApiCommand extends Command
{
    public $signature = 'laravel-simpro-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
