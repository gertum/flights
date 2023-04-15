<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    public function source(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'fk_source_port');
    }

    public function destination(): BelongsTo {
        return $this->belongsTo(Port::class, 'fk_destination_port');
    }

}
