<?php

namespace App\Http\Controllers;

use App\Driver;
use App\TripRequest;
use App\Vehicle;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    function ongoinIndex(){
        $trip_request=TripRequest::where('statut','=','Pending')->paginate(20);
        return view('dispatcher.ongoin',['trip_request'=>$trip_request]);
    }
    function history($page){
        $trip_request=TripRequest::where('statut','=',$page)->paginate(20);
        return view('dispatcher.request_history',['trip_request'=>$trip_request,$page.''=>$page]);
    }
    function create($trip_request,Request $request){
        $vue='dispatcher.manage_request';
        if(isset($request->reupdate)){
            $vue='pages.requestUpdate';
        }
        $driver=Driver::all();
        $vehicle=Vehicle::all();
        return view($vue,['Drivers'=>$driver,'Vehicles'=>$vehicle,'trip_request'=>$trip_request]);
    }
    function update(Request $request){
        $trip_req=TripRequest::find($request->request_id);
        $trip_req->statut='Approved';
        $trip_req->vehicle_id=$request->vehicle_id;
        $trip_req->driver_id=$request->driver_id;

        $trip_req->save();
        return redirect('dispatcher_dashboad/ongoin');
    }

    function reupdate(Request $request){
        $trip_req=TripRequest::find($request->request_id);
        $trip_req->statut='Approved';
        $trip_req->vehicle_id=$request->vehicle_id;
        $trip_req->driver_id=$request->driver_id;

        $trip_req->save();
        return redirect('history/Approved');
    }
}
