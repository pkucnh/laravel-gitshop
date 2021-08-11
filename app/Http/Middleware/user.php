<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Closure;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(auth()->user()->level == 1){
            return $next($request);
        }elseif(auth()->user()->level == 8){
            return $next($request);
        }else{
            return redirect::to('dashboard')->with('message','Bạn không có quyền admin');
        }   

   }
   
}
