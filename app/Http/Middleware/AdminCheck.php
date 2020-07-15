<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminCheck
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
        if(Session::get('role')!="admin"){
            Session()->flash("message","Please dont't try to going unautorized page. You will be ban");
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
