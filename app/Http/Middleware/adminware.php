<?php

namespace App\Http\Middleware;

use Closure;

class adminware
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
        //validasi akses hanya untuk admin
        if(auth()->user()->admin == true){
            return $next($request);
        }
        return redirect('/homePage');
    }
}
