<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
        'name_fa', 'name_en', 'description', 'lat', 'long', 'image', 'video', 'slug'
    ];
}
