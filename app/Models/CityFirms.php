<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Firms;

class CityFirms extends Model
{
    protected $table = 'city_firms';

    protected $fillable = [
        'city_id', 'firms_id',
    ];

    public function firms()
    {
    	return $this->hasOne(Firms::class, 'id', 'firms_id');
    }
}
