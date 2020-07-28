<?php

namespace App\Http\Controllers;

use App\TripRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('passenger.dashboard');
    }

    public function form()
    {
        return view('passenger.form');
    }

    public function list()
    {
        return view('passenger.history');
    }
    function add(Request $request)
    {
        $req=new TripRequest();
        $req->pickup_date=$request->p_date;
        $req->user_id=$request->passenger_id;
        $req->pickup_time=$request->p_time;
        $req->pickup_point=$request->p_point;
        $req->statut='Pending';
        $req->drop_location=$request->d_location;
        $req->itinerary_desc=$request->i_desc;
        $req->save();
        return redirect('requestForm');
    }

    function ListRequests($userid)
    {
        $req=TripRequest::where("user_id","=",$userid)->paginate(20);
        return view('passenger.history',['list_req'=>$req]);
    }
}
