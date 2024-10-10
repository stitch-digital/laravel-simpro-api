<?php

namespace StitchDigital\LaravelSimproApi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Helper\Table;

class LaravelSimproApiCommand extends Command
{
    protected $signature = 'simpro:list-requests';

    protected $description = 'List all available requests in the Simpro package';

    public function handle(): int
    {
        $this->info('Listing all available requests in the Simpro package:');

        // Define the path to the Requests folder
        $requestPath = base_path('vendor/stitchdigital/laravel-simpro-api/src/Requests');

        // Check if the directory exists
        if (! is_dir($requestPath)) {
            $this->error('Requests directory not found.');

            return self::FAILURE;
        }

        // Create a Filesystem instance to work with files
        $filesystem = new Filesystem;

        // Get all PHP files in the Requests directory recursively
        $files = $filesystem->allFiles($requestPath);

        // Create an array to store formatted paths
        $rows = [];

        // Loop through the files and format the output
        foreach ($files as $file) {
            // Get the relative path from the Requests folder and format it
            $relativePath = str_replace([$requestPath.DIRECTORY_SEPARATOR, '.php'], '', $file->getPathname());

            // Split the path into parts
            $pathParts = explode(DIRECTORY_SEPARATOR, $relativePath);

            // Combine subdirectory and filename into a formatted path
            $subDirectory = implode(' / ', array_slice($pathParts, 0, -1));
            $fileName = end($pathParts);

            // Add the subdirectory and filename to the rows array
            $rows[] = [$subDirectory, $fileName];
        }

        // Create a table to display the requests
        $this->table(
            ['Directory', 'Request'],  // Table headers
            $rows                        // Table rows
        );

        $this->info('Request listing complete.');

        return self::SUCCESS;
    }
}
