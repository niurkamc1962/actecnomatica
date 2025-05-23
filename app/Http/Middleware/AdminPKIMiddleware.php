<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPKIMiddleware
{
    /**
     * Handle an incoming request.
     * MIDDLEWARE PARA QUE SI NO ES SUPERADMIN o ADMIN NO PUEDA ENTRAR EN LA PARTE
     * DE ADMINISTRACION DEL PROYECTO
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()  && (auth()->user()->hasRole('SuperAdmin') || (auth()->user()->hasRole('Admin'))) ){
            return $next($request);
        }

        //redireccionando a la pagina inicial
        return redirect('home');

    }
}
