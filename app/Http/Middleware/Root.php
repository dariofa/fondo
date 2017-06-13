<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;


class Root
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
        /*if (Auth::guard('tipo_rol')) {
            return redirect('/home');
        }*/
        $users = User::all();
        //dd($users);

        $bandera = Auth::user()->bandera;
        $user_rol = Auth::user()->tipo_rol;

        if ($user_rol == "root") {
             return $next($request);
            //return redirect('/home');
        }


       

       
    }
}
