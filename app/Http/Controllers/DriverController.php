<?php

namespace App\Http\Controllers;

use App\TripRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    function index($id){
        $trip_request=TripRequest::where('statut','=','Pending')->where('driver_id','=',$id)->paginate(20);
        return view('driver.ongoin',['trip_request'=>$trip_request]);
    }

    function history($id){
        $trip_request=TripRequest::where('statut','=','Completed')->where('driver_id','=',$id)->paginate(20);
        return view('driver.history',['trip_request'=>$trip_request]);
    }
}
