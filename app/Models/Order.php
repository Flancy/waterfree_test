<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Products;
use App\Models\City;

class Order extends Model
{
	public const STATUS_WAIT = 'wait';
	public const STATUS_SUCCESS = 'success';

    protected $fillable = [
    	'product_id', 'user_id', 'city_id', 'status', 'name', 'phone', 'order_group_id'
    ];

    public function product()
    {
    	return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function city()
    {
    	return $this->hasOne(City::class, 'id', 'city_id');
    }
}
