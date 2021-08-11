<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Closure;

class Quantri
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(auth()->user()->level == 1  or auth()->user()->level == 2  or auth()->user()->level == 3  or auth()->user()->level == 4  or auth()->user()->level == 5 or auth()->user()->level == 6  or auth()->user()->level == 8){
            return $next($request);
        }else{
            return redirect::to('login')->with('message','Bạn không có quyền admin');
        }   

   }
   
}
