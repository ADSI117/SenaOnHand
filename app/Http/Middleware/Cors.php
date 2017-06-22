<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
      return $next($request) // listo este ya quedo para que el contralador que se le inyecte este Middleware funcione
                      ->header('Access-Control-Allow-Origin', '*')
                      ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,PATCH,DELETE,OPTIONS')
                      ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
