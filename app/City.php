<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name_fa', 'name_en', 'description', 'lat', 'long', 'country_id', 'slug'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function area(){
        return $this->hasMany(Area::class);
    }
}
