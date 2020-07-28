<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->attempt(['username'=>$request->username,'password'=>$request->password])) {
            if(Auth::User()->role==0){
               return redirect('passenger_dashboard');
            }
            if (Auth::User()->role==1){
                return redirect('DriverPending/'.Auth::user()->Driver->id);
            }
            if (Auth::User()->role==2){
                return redirect('dispatcher_dashboad');
            }
            //return redirect('/home');
        }

        return $next($request);
    }
}
