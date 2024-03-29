<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Port extends Model
{
    use HasFactory;

    protected $table = 'ports';
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    protected $fillable = ['code', 'name', 'city_id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function scopeFilter(Builder $query, $filter): void
    {
        if (!is_array($filter)) {
            return;
        }

        if (array_key_exists('code', $filter)) {
            $code = $filter['code'];
            $query->where('code', 'like', "%$code%");
        }

        if (array_key_exists('name', $filter)) {
            $name = $filter['name'];
            $query->where('name', 'like', "%$name%");
        }
    }
}
