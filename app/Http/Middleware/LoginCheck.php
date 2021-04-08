<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        //print_r(\Session::get('creds'));
        if(empty(\Session::get('creds')))
        {
            return redirect()->route('list'); 
        }
        return $next($request);
    }
}
