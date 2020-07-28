<?php

namespace App\Http\Controllers\Auth;

use App\Dispatcher;
use App\Driver;
use App\Passenger;
use App\User;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
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
        if($request->role==0){
            Passenger::create([
                'user_id'=>$user->id,
                'office'=>$request->office
            ]);
        }
        if($request->role==1){
            Driver::create([
                'user_id'=>$user->id,
            ]);
        }
        if($request->role==2){
            Dispatcher::create([
                'user_id'=>$user->id,
            ]);
        }
        return redirect('login');
    }

    function form($page=null,$update=null){
             if($page!=null){
                 if($update=!null){
                     $user=User::find($update);
                     switch ($user->id){
                         case 0:
                             return view('auth.register',['form'=>'passenger','user'=>$user]);
                             break;
                         case 1:
                             return view('auth.register',['form'=>'driver','user'=>$user]);
                             break;
                         case 2:
                             return view('auth.register',['form'=>'dispatcher','user'=>$user]);
                             break;
                     }
                 }else{
                     switch ($page){
                         case "passenger":
                             return view('auth.register',['form'=>'passenger']);
                             break;
                         case "driver":
                             return view('auth.register',['form'=>'driver']);
                             break;
                         case "dispatcher":
                             return view('auth.register',['form'=>'dispatcher']);
                             break;
                     }
                 }
             }
    }
    function index(Request $request){
         if (isset($request->role) && $request->role!=null){
             $users=User::where('role','=',$request->role)->paginate(20);
         }else{
             $users=User::paginate(20);
         }
         return view('dispatcher.userlist');
    }
}
