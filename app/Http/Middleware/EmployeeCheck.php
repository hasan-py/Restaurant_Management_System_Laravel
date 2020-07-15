<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class EmployeeCheck
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
        if(Session::get('role')=="employee" or Session::get('role')=="admin"){
            return $next($request);
        }else{
            Session()->flash("message","Please dont't try to going unautorized page. You will be ban");
            return redirect()->route('dashboard');
        }
        
    }
}
