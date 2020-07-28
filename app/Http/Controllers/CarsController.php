<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    function store($id=null,Request $request){
        if($id){
            $v=Vehicle::find($id);
            $v->brand=$request->brand;
            $v->model=$request->model;
            $v->color=$request->color;
            $v->actual_km=$request->actual_km;
            $v->year=$request->year;
            $v->status=$request->status;
            $v->save();
            return redirect('cars/add/'.$id);
        }else{
            Vehicle::create([
                'brand'=>$request->brand,
                'model'=>$request->model,
                'color'=>$request->color,
                'actual_km'=>$request->actual_km,
                'year'=>$request->year,
                'status'=>$request->status
            ]);
            return redirect('cars/add');
        }

    }
    function update(Request $request){

    }

    function create($id=null){
        $v=null;
        if($id!=null){
            $v=Vehicle::find($id);
        }
        return view('dispatcher.add_car',['vehicle'=>$v]);
    }

    function index(Request $request){
        if(isset($request->carfilter)){
            switch ($request->carfilter){
                case '<':
                    $cars=Vehicle::where('actual_km','<','100000')->paginate(10);
                    break;
                case '>=':
                    $cars=Vehicle::where('actual_km','>=','100000')->paginate(10);
                    break;
                case '*':
                    $cars=Vehicle::paginate(10);
                    break;
            }
        }
        else{
            $cars=Vehicle::paginate(10);
        }
        return view('dispatcher.carslist',['Vehicles'=>$cars]);
    }
    function delete($id){
        $v=Vehicle::find($id);
        $v->delete();
        return redirect('cars/list');
    }
}
