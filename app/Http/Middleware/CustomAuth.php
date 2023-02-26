<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path=$request->path();
        if(($path=="login" || $path=="/") && (Session::get('user'))){
            return redirect('Home');
        }
        else if(($path =="registerNewUser" || $path=="registerNewCooperative" || $path=="Home" || $path=="viewsystemuser" || $path=="viewfarmers" || $path=="viewdiseases" ||  $path=="viewcooperatives") && (!Session::get('user')) ){
            return redirect('login');
        }
        return $next($request);
    }
}
