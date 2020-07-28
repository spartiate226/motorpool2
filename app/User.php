<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firt_name',
        'last_name',
        'mobile_phone',
        'username',
        'role',
        'email',
        'picture',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function Dispacther(){
        return $this->hasOne(Dispatcher::class);
    }
    function Driver(){
        return $this->hasOne(Driver::class);
    }
    function Passenger(){
        return $this->hasOne(Passenger::class);
    }
    function TripRequest(){
        return $this->hasOne(TripRequest::class);
    }
    function Role($numb){
        if($numb==0){
            return "Passenger";
        }elseif ($numb==1){
            return "Driver";
        }elseif ($numb==2){
            return "Dispatcher";
        }
    }
}
