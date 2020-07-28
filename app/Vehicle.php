<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded=[];
    function TripRequest(){
        return $this->hasMany(TripRequest::class);
    }

    function TripRepport(){
        return $this->belongsTo(TripRepport::class);
    }
}
