<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class FirmConnect extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'city_id', 'firm_id', 'status'
    ];
}
