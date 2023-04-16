<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    const TABLE = 'cities';

    use HasFactory;

    protected $table = self::TABLE;

    public function scopeFilterName(Builder $query, $filter)
    {
        if (!is_string($filter)) {
            return;
        }

        $query->where('name', 'like', "%$filter%");
    }
}
