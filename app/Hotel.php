<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name_fa',
        'name_en',
        'slug',
        'area_id',
        'city_id',
        'country_id',
        'provider_id',
        'attraction_id',
        'description',
        'lat',
        'long',
        'image',
        'video',
        'rates'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function provider(){
        return $this->hasMany(Provider::class);
    }
}
