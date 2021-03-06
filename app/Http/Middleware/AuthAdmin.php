<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Kernel;

class AuthAdmin
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

        if(auth()->user()->roleID == 2)
        {
           return $next($request);
        }
        else if(auth()->user()->roleID == 1)
        {
            return redirect('user/search');
        }
        
         
    }
}
