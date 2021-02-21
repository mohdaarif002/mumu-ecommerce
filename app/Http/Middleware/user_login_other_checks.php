<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class user_login_other_checks
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
        if($request->session()->has('user') ){
           //do nothing
        }else{
            return redirect('/login');
        }

        return $next($request);
    }
}
