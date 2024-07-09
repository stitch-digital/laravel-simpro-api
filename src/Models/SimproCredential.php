<?php
declare(strict_types=1);

namespace StitchDigital\LaravelSimproApi\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @method static Builder|SimproCredential where($column, $operator = null, $value = null, $boolean = 'and')
 */
class SimproCredential extends Model
{
    use HasFactory;
    protected $fillable = [
        'authenticatable_id',
        'authenticatable_type',
        'base_url',
        'api_key',
        'simpro_authenticator',
    ];

    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }
}
