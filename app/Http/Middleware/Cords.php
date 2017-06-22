<?php

namespace App\Http\Middleware;

use Closure;

class Cords
{

    public function handle($request, Closure $next)
    {

      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        return $next($request);
    }
}
