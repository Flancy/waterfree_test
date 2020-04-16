<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Products extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'logo', 'price', 'liter', 'comment', 'hit', 'city_id', 'firm_id'
    ];

    public function cities()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function firms()
    {
        return $this->hasOne('App\Models\Firms', 'id', 'firm_id');
    }
    
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
