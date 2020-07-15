<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class loginCheck
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
        if(!Session::get('username') && !Session::get('id')){
            Session()->flash('unauthorizedLogin',"Please you need to login first.");
            return redirect()->route('login');
        }
        return $next($request);
    }
}
