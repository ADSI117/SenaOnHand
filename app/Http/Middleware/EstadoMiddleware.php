<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EstadoMiddleware
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
      if (Auth::user()->getEstado() == 1){
        Auth::logout();
        return redirect('/info-mensaje');
      }else if (Auth::user()->getEstado() == 3){
        Auth::logout();
        return redirect ('info-suspendido');
      }
      return $next($request);

    }
}
