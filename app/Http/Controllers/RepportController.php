<?php

namespace App\Http\Controllers;

use App\TripRepport;
use App\TripRequest;
use App\Vehicle;
use Illuminate\Http\Request;

class RepportController extends Controller
{
    function create(Request $request){
        $Vehicles=Vehicle::all();
        return view('pages.repport',['request_id'=>$request->request_id,'Vehicles'=>$Vehicles]

        );}

    function store(Request $request){
        $trip_request=TripRequest::find($request->trip_request_id);
        $vehicle=Vehicle::find($trip_request->vehicle_id);
        $depart_km=$vehicle->actual_km;
        TripRepport::create([
            "trip_request_id"=>$request->trip_request_id,
            "deppart_km"=>$depart_km,
            "arriv_km"=>$request->arriv_km,
            "repport_date"=>$request->repport_date,
            "repport_time"=>$request->repport_time,
            "description"=>$request->description
        ]);
        $vehicle->actual_km=$depart_km+$request->arriv_km;
        $vehicle->save();
        $trip_request->statut="Completed";
        $trip_request->save();
       return redirect('history/treated');
    }
    function print($id){
        $request=TripRequest::find($id);
        return view('pages\print',['request'=>$request]);
    }
}
