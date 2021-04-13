<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureClubMaker
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
        if(Auth::user()->directorinfo->id == 0 && Auth::user()->directorinfo->rol > 2){
            return redirect('/club')
            ->with('message', 'Accion no permitida, pedir ayuda');
        }
        return $next($request);
    }
}
