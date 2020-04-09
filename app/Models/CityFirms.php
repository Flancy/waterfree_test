<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityFirms extends Model
{
    protected $table = 'city_firms';

    protected $fillable = [
        'city_id', 'firms_id',
    ];
}
