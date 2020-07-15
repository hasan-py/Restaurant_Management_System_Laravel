<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class logoutCheck
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
        if(Session::get('username') && Session::get('id')){
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
