<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 
        'meeting_id',
         'start_time',
         'end_time',
         'status',
         'room_id',
         'date'
    ];

    public function Meeting(){
    	return $this->belongsTo('App\Meeting');
    }
}

