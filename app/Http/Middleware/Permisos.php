<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Permisos
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
        if (Auth::user()->rol_id && kvfj(Auth::user()->rol->permisos,Route::currentRouteName()) == true){
            return $next($request);
        }else{
            abort(401);
        }
    }
}
