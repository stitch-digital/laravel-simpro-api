<?php
declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use StitchDigital\LaravelSimproApi\Models\SimproCredential;

/**
 * @mixin Model
 */
trait HasSimproCredential
{
    /**
     * Boot the trait.
     *
     * @return void
     * @throws Exception
     */
    public static function bootHasSimproCredential(): void
    {
        static::creating(function (Model $model) {
            self::ensureSingleUsage($model);
        });
    }

    /**
     * Ensure the trait is only used on one model.
     *
     * @param Model $model
     * @return void
     * @throws Exception
     */
    protected static function ensureSingleUsage(Model $model): void
    {
        if (SimproCredential::where('authenticatable_type', get_class($model))->exists()) {
            throw new Exception('The HasSimproCredential trait can only be used on one model.');
        }
    }

    /**
     * Get the simpro credential relationship.
     *
     * @return MorphOne
     */
    public function simproCredential(): MorphOne
    {
        return $this->morphOne(SimproCredential::class, 'authenticatable');
    }

    /**
     * Set the Simpro credentials for the model.
     *
     * @param string $baseUrl
     * @param string $apiKey
     * @return SimproCredential
     * @throws Exception
     */
    public function setSimproCredentials(string $baseUrl, string $apiKey): SimproCredential
    {
        $simproCredential = $this->simproCredential()->updateOrCreate([], [
            'base_url' => $baseUrl,
            'api_key' => $apiKey,
        ]);

        if (!$simproCredential instanceof SimproCredential) {
            throw new Exception('Expected instance of SimproCredential');
        }

        return $simproCredential;
    }

    /**
     * Get the Simpro credentials for the model.
     *
     * @return array|null
     */
    public function getSimproCredentials(): ?array
    {
        $credential = $this->simproCredential()->first();

        if ($credential) {
            return [
                'base_url' => $credential->base_url,
                'api_key' => $credential->api_key,
            ];
        }

        return null;
    }
}
