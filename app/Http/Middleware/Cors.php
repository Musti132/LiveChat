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
        if ($request->isMethod("OPTIONS")) {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return Response::make('OK', 200);
           // return $response('');
        }
        //$request->headers->set('Accept', 'application/json');
        
        return $next($request);
        /*
        return $next($request)
            ->header('Access-Control-Allow-Headers', 'Authorization')
            ->header('Access-Control-Expose-Headers', 'Authorization')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');*/
    }
}
