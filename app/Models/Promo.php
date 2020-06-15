<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
    	'code', 'organization', 'phone', 'address', 'prize'
    ];
}
