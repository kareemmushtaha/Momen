<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        // dd(admin()->user());
        if(admin()->user()->group->$role == "disable" && admin()->user()->group_id != null)
        {
            session()->flash('error', 'لا تملك صلاحيه لدخول  الى هذه الصفحة ');
            return back();
        }
        return $next($request);
    }
}
