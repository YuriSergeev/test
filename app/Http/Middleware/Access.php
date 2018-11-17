<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Access
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
        if(Auth::user()->access == true)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('welcome');  
        }
    }
}
