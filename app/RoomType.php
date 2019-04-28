<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'type', 'bed_type_id'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
