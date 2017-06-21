<?php

namespace App\Http\Middleware;

use Closure;

class DominioMiddleware
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
      $dominio = explode("@", $request['email']);
      // dd($dominio[0]);
      if (!$dominio.strcmp('misena.edu.co') || $dominio.strcmp('sena.edu.co')){
        dd('Dominio incorrecto');
      }

      return $next($request);
    }
}
