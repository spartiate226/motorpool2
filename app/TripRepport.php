<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripRepport extends Model
{
    protected $guarded=[];
    public function request()
    {
        return $this->belongsTo(TripRequest::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
