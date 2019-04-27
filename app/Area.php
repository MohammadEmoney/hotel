<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name_fa', 'name_en', 'description', 'city_id', 'slug'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
