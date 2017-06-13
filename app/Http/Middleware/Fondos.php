<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Fondos
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
        $user_rol = Auth::user()->tipo_rol;
        $cuentas = count(Auth::user()->cuentas);

        if ($cuentas<=0) {

           
       return redirect('/home');          
             
        }

       return $next($request);
    }
}
