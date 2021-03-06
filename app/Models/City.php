<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Firms;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    public function firms()
    {
        return $this->belongsToMany(Firms::class);
    }
}
