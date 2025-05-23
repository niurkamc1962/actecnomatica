<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrameHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * MIDDLEWARE CREADO PARA EL X-FRAME-OPTION
     * LA SEGURIDAD DEL PROYECTO
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Frame-Options','SAMEORIGIN');
        return $response;

        //return $next($request);
    }
}
