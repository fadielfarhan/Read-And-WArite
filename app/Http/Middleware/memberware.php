<?php

namespace App\Http\Middleware;

use Closure;

class memberware
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
        //validasi akses hanya untuk member
        if(auth()->user()->admin == false){
            return $next($request);
        }
        return redirect('/homePage');
    }
}
