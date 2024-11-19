<?php

namespace App\Http\Middleware;

use Closure;

class Status
{

   public function handle($request, Closure $next, $guard = null)
   {
      if (setting()->system_status == 'close') {

         return redirect()->route('maintenance');



      }
      return $next($request);
   }
}
