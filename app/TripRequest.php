<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripRequest extends Model
{
    function Vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    function User(){
        return $this->belongsTo(User::class);
    }
    function Driver(){
        return $this->belongsTo(Driver::class);
    }

    public function repport()
    {
        return $this->hasOne(TripRepport::class);
    }
}
