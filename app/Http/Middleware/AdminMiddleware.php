<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
      if ((Auth::user()->getRol() == 1) or (Auth::user()->getRol() == 2)){
        
        return redirect ('/main-panel');
      }

      return $next($request);

    }
}
