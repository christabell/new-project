<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'description',
        'seats',
        'image',
        
    ];

    public static function getRooms(){
        $rooms = Room::all();
        return $rooms;
    }
}
