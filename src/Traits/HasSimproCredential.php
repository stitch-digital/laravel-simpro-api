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
}
