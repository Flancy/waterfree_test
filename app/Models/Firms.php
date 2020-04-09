<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Firms extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'firms';

    protected $fillable = [
        'name', 'slug', 'logo'
    ];
    
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
}
