<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Port extends Model
{
    use HasFactory;

    protected $table = 'ports';
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'fk_city_id');
    }
}
