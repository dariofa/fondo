<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuenta;
use App\MovimientoCuenta;

class CuentasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $cuentas = Cuenta::orderBy('id','ASC')->get();
         $cuentas ->each(function($cuentas){
         $cuentas->user;               
    });

        return view('admin.cuentas.index',['cuentas'=>$cuentas]);  
}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);

        return view('admin.cuentas.create',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = new Cuenta($request->all());
        $cuenta->save();
    }

     public function storeAjax(Request $request)
         {
        $cuenta = new Cuenta($request->all());
        $cuenta->save();
       
      //return $cuenta;
      return response()->json($cuenta);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
       $cuentas = Cuenta::where('user_id', $id)->get();

       $cuentas ->each(function($cuentas){
            //$cuentas->categoria;
            $cuentas->user;
        });
       return view('admin.cuentas.show',['cuentas'=>$cuentas]);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      return "Hola mundo";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
