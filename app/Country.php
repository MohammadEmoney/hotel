<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name_fa', 'name_en', 'slug', 'description', 'lat', 'long',
    ];
}
