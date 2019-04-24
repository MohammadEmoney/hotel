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
}
