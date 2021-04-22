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
        if(Auth::user()->directorinfo == null){
            return redirect('/index')
            ->with('message', 'Accion no permitida, pedir ayuda');
        }
        if(Auth::user()->directorinfo->rol > 6){
            return redirect('/index')
            ->with('message', 'Accion no permitida, pedir ayuda');
        }
        return $next($request);
    }
}
