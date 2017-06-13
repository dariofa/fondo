<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = User::where('tipo_rol','=','root')->first();
    
    if ($user !== null) {
       $estado = $user->bandera;
        if ($estado != 'false') {
        return abort(503);
        }else{
          return view('home');  
        }

    }
    return abort(503);    
        
    }
}
