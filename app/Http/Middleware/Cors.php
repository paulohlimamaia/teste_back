<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        $true_request = $next($request);
        $true_request->headers->set('Access-Control-Allow-Origin', '*');
        $true_request->headers->set('Access-Control-Allow-Methods', '*');
        $true_request->headers->set('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');


        return $true_request;
    }
}
