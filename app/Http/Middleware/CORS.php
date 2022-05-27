<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        header('Access-Control-Allow-Methods : Get , Post , PATCH , PUT , DELETE , OPTIONS');
        header ( 'Access-Control-Allow-Headers : Origin , Content-Type , X-Auth-Token ,Authorization , Accept , charset , boundary , Content-Lenght');
        header(  'Access-Control-Allow-Origin: *');
        return $next($request);
    }
}
