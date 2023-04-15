<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class City
{
    const TABLE = 'cities';

    use HasFactory;

    protected $table = self::TABLE;
}
