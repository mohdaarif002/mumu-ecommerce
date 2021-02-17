<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class user_login_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('user') && ($request->path()=='login' ||  $request->path()=='signup') ){
            return redirect('/');
        }

        
        
        
       
        return $next($request);
    }
}
