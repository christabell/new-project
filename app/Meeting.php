<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'user_id', 
        'room_id',
         'title',
         'description',
    ];

    public function Meeting(){
    	return $this->belongsTo('App\Booking');
    }
}
 