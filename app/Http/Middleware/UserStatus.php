<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('id','=',session("userDetails")->id)->first();
       // dd($user->status);
        if (!empty($user) && $user->status === 0 ){
            //Auth::logout();
            return $next($request);
        }else{
            return redirect()->route('user-logout');
        }

//dd(Session::get('userDetail'));
       // return $next($request);
    }
}
