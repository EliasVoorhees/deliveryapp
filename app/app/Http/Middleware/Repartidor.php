<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Repartidor
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
       if (Auth::check() &&  Auth::user()->tipo == "repartidor" && Auth::user()->activo)
        return $next($request);

       if (Auth::check() &&  Auth::user()->tipo == "admin" && Auth::user()->activo)
        return redirect('/admin');

       if (Auth::check() && !Auth::user()->activo)
        Auth::logout();
    
        return redirect('/');
    }
}
