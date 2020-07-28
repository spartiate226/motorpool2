<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $guarded=[];

    function User(){
        return $this->belongsTo(User::class);
    }
}
