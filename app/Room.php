<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'hotel_id', 'type', 'capacity', 'currency', 'price'
    ];

    public function roomtype(){
        return $this->hasMany(RoomType::class);
    }
}
