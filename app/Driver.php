<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded=[];

    function User(){
        return $this->belongsTo(User::class);
    }
    function TripRequest(){
        return $this->hasMany(TripRequest::class);
    }
}
