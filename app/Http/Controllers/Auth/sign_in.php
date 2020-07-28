<?php

namespace App\Http\Controllers\Auth;

use App\Dispatcher;
use App\Driver;
use App\Passenger;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class sign_in extends Controller
{
    function create(Request $request)
    {
        $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'mobile_phone'=>$request->mobile_phone,
            'username'=>$request->username,
            'role'=>$request->role,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->role=='passenger'){
            Passenger::create([
                'user_id'=>$user->id,
                'office'=>$request->office
            ]);
        }
        if($request->role=='driver'){
            Driver::create([
                'user_id'=>$user->id,
                'status'=>$request->status,
            ]);
        }
        if($request->role=='dispatcher'){
            Dispatcher::create([
                'user_id'=>$user->id,
            ]);
        }
        return redirect('login');
    }

    function form($page=null,$update=null){
        if($page!=null){
            if($update!=null){

                $user=User::find($update);
                switch ($user->role){
                    case 0:
                        return view('auth.register',['form'=>'Passenger','user'=>$user]);
                        break;
                    case 1:
                        return view('auth.register',['form'=>'Driver','user'=>$user]);
                        break;
                    case 2:
                        return view('auth.register',['form'=>'Dispatcher','user'=>$user]);
                        break;
                }
            }else{
                switch ($page){
                    case "Passenger":
                        return view('auth.register',['form'=>'Passenger']);
                        break;
                    case "Driver":
                        return view('auth.register',['form'=>'Driver']);
                        break;
                    case "Dispatcher":
                        return view('auth.register',['form'=>'Dispatcher']);
                        break;
                }
            }
        }
    }

    function index(Request $request){
        if (isset($request->role) && $request->role!=null){
            if($request->role=="*"){
                $users=User::paginate(20);
            }else{
                $users=User::where('role','=',$request->role)->paginate(20);
            }

        }else{
            $users=User::paginate(20);
        }
        return view('dispatcher.userlist',['users'=>$users]);
    }

    function update(Request $request){
        $user=User::find($request->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->mobile_phone=$request->mobile_phone;
        $user->username=$request->username;
        $user->role=$request->role;
        $user->email=$request->email;
        $user->save();
        switch ($user->role){
            case 0:
                $depend=Passenger::find($user->Passenger->id);
                $depend->office=$request->office;
                $depend->save();
                $page="Passenger";
                break;
            case 1:
                $depend=Driver::find($user->Driver->id);
                $depend->status=$request->status;
                $depend->save();
                $page="Driver";
                break;
            case 2:
                $page="Dispatcher";
                break;
        }
        return redirect('regist/'.$page.'/'.$user->id);
    }

    function delete($id){
        $user=User::find($id);
        switch ($user->role){
            case 0:
                $depend=Passenger::find($user->Passenger->id);
                break;
            case 1:
                $depend=Driver::find($user->Driver->id);
                break;
            case 2:
                $depend=Dispatcher::find($user->Dispatcher->id);
                break;
        }
        $user->delete();
        $depend->delete();
        return redirect('userlist');
    }
}
