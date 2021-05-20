<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureIsPastor
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
        if(Auth::user()->director == null){
            return redirect('/index')
            ->with('message', 'Accion no permitida, pedir ayuda');
        }
        if(Auth::user()->director->rol > 6){
            return redirect('/index')
            ->with('message', 'Accion no permitida, pedir ayuda');
        }
        return $next($request);
    }
}
