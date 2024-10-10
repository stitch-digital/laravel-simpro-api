<?php

namespace StitchDigital\LaravelSimproApi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use ReflectionClass;
use ReflectionParameter;

use function Laravel\Prompts\table;

class LaravelSimproApiCommand extends Command
{
    protected $signature = 'simpro:list-requests';

    protected $description = 'List all available requests in the Simpro package';

    public function handle(): int
    {
        $this->info('Listing all available requests in the Simpro package:');

        // Get the request path
        $requestPath = $this->getRequestPath();

        // Validate the request path
        if (! $this->validateRequestPath($requestPath)) {
            return self::FAILURE;
        }

        // Fetch the request classes and format the output
        $rows = $this->getRequestRows($requestPath);

        // Display the formatted requests in a table using Laravel Prompts
        $this->displayRequestTable($rows);

        $this->info('Request listing complete.');

        return self::SUCCESS;
    }

    /**
     * Get the base path for the Requests folder.
     */
    protected function getRequestPath(): string
    {
        return base_path('vendor/stitch-digital/laravel-simpro-api/src/Requests');
    }

    /**
     * Validate if the request path exists.
     */
    protected function validateRequestPath(string $requestPath): bool
    {
        if (! is_dir($requestPath)) {
            $this->error('Requests directory not found.');

            return false;
        }

        return true;
    }

    /**
     * Fetch and format the request classes into table rows.
     *
     * @return array<int, array{string, string, string}>
     */
    protected function getRequestRows(string $requestPath): array
    {
        $filesystem = new Filesystem;
        $files = $filesystem->allFiles($requestPath);
        $rows = [];

        foreach ($files as $file) {
            $relativePath = $this->getRelativePath($file, $requestPath);
            $subDirectory = $this->getSubDirectory($relativePath);
            $fileName = $this->getFileName($relativePath);
            $className = $this->getClassName($relativePath);
            $constructorParams = $this->getConstructorParams($className);

            $rows[] = [$subDirectory, $fileName, implode(', ', $constructorParams)];
        }

        return $rows;
    }

    /**
     * Display the request data in a table using Laravel Prompts.
     *
     * @param  array<int, array{string, string, string}>  $rows
     */
    protected function displayRequestTable(array $rows): void
    {
        table(
            headers: ['Directory', 'Request', 'Parameters'],
            rows: $rows
        );
    }

    /**
     * Get the relative path of a file.
     */
    protected function getRelativePath(\SplFileInfo $file, string $requestPath): string
    {
        return str_replace([$requestPath.DIRECTORY_SEPARATOR, '.php'], '', $file->getPathname());
    }

    /**
     * Get the subdirectory from a relative path.
     */
    protected function getSubDirectory(string $relativePath): string
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $relativePath);

        return implode(' / ', array_slice($pathParts, 0, -1));
    }

    /**
     * Get the file name from a relative path.
     */
    protected function getFileName(string $relativePath): string
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $relativePath);

        return end($pathParts);
    }

    /**
     * Get the fully qualified class name from a relative path.
     */
    protected function getClassName(string $relativePath): string
    {
        return 'StitchDigital\\LaravelSimproApi\\Requests\\'.str_replace(DIRECTORY_SEPARATOR, '\\', $relativePath);
    }

    /**
     * Get the constructor parameters for a given class.
     *
     * @return array<int, string>
     */
    protected function getConstructorParams(string $className): array
    {
        if (! class_exists($className)) {
            return [];
        }

        $reflection = new ReflectionClass($className);

        $constructor = $reflection->getConstructor();
        if (! $constructor) {
            return [];
        }

        return array_map(
            fn (ReflectionParameter $param) => $this->formatParameter($param),
            $constructor->getParameters()
        );
    }

    /**
     * Format a ReflectionParameter into a string for display.
     */
    protected function formatParameter(ReflectionParameter $param): string
    {
        $type = $param->getType();
        $typeString = '';

        // Handle named types (e.g., int, string)
        if ($type instanceof \ReflectionNamedType) {
            $typeString = $type->getName().' ';
        }
        // Handle union types (e.g., int|string)
        elseif ($type instanceof \ReflectionUnionType) {
            $typeString = implode('|', array_map(
                fn ($t) => $t instanceof \ReflectionNamedType ? $t->getName() : '',
                $type->getTypes()
            )).' ';
        }
        // Handle intersection types (e.g., A&B)
        elseif ($type instanceof \ReflectionIntersectionType) {
            $typeString = implode('&', array_map(
                fn ($t) => $t instanceof \ReflectionNamedType ? $t->getName() : '',
                $type->getTypes()
            )).' ';
        }

        $paramString = '$'.$param->getName();

        // Handle optional parameters with default values
        if ($param->isOptional()) {
            $paramString .= ' = '.var_export($param->getDefaultValue(), true);
        }

        return $typeString.$paramString;
    }
}
