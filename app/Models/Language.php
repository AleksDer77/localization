<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 *
 *
 * @property string $id
 * @property string $name
 * @property boolean $active
 * @property boolean $default
 * @property boolean $fallback
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereFallback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'active',
        'default',
        'fallback',
    ];

    public $casts = [
        'active'   => 'boolean',
        'default'  => 'boolean',
        'fallback' => 'boolean',

    ];

    public function getStateText(): string
    {
        $state = [];

        if ($this->active) {
            $state[] = 'Активный';
        }

        if ($this->default) {
            $state[] = 'По умолчанию';
        }

        if ($this->fallback) {
            $state[] = 'Резервный';
        }

        return implode(', ', $state);
    }

    public static function findDefault(): self|null
    {
        return self::query()
            ->where('active', true)
            ->where('default', true)
            ->first();
    }

    public static function findFallback(): self|null
    {
        return self::query()
            ->where('active', true)
            ->where('fallback', true)
            ->first();
    }

    public static function getActive(): \Illuminate\Database\Eloquent\Collection
    {
        return self::query()
            ->where('active', true)
            ->get();
    }

    public static function findActive(string $id): self
    {
        return self::query()
            ->where('active', true)
            ->find($id);
    }

}
