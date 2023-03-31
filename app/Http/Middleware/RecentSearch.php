<?php

namespace App\Http\Middleware;

use Closure;
use App\SearchRecent;


class RecentSearch
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

        if (isset($_COOKIE['powerperformance_cookie'])){
            $id = base64_decode($request->route()->parameter('id'));
            $qr = SearchRecent::where('cookie_name','=',$_COOKIE['powerperformance_cookie'])->where('car_id','=',$id)->first();


            $cookie = new  SearchRecent();
            $cookie->car_id = $id;
            $cookie->cookie_name = $_COOKIE['powerperformance_cookie'];

            if ($qr == null){
                if ($cookie->save()){
                    return $next($request);
                };
            }



        }
        return $next($request);
    }
}
