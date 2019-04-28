<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'bed_type_id', 'room_type_id'
    ];

    public function roomtype(){
        return $this->hasMany(RoomType::class);
    }
}
