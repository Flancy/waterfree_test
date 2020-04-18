<?php

namespace App\Models\User;

use App\Models\Products;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class FirmConnect extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'city_id', 'firm_id', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
