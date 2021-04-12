<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsDirector
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
/*         $user = DB::table('users')
        ->where('id', '=', Auth::id())
        ->first();
 */
        if(Auth::user()->directorinfo->id != 0 && Auth::user()->directorinfo->rol === 'director de categoria'){
            return $next($request);    
        }

        return redirect('/posts');
        
    }
}
