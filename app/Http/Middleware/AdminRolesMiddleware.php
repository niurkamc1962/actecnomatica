<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

use Session;
use Auth;

/**
 * Class AdminRolesMiddleware
 * @package App\Http\Middleware
 *
 * Middleware para permitir trabajar con los roles del proyecto
 *
 */
class AdminRolesMiddleware
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
        //return $next($request);
        if(auth()->check()  && (auth()->user()->hasRole('SuperAdmin') || (auth()->user()->hasRole('Admin')))  ){
            return $next($request);
        }

        //mensaje de error
        Session::flash('AdminRolesError', 'Ud, no esta autorizado para la opcion Roles');
        return redirect('admin');
    }
}
