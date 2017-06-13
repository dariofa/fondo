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
        
        $cuentas = Cuenta::orderBy('id','ASC')->where('categoria','=','ahorro')->get();
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
        $cuenta = Cuenta::find($id);
       return view('admin.cuentas.edit',['cuenta'=>$cuenta]);

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

        $cuenta = Cuenta::find($id);
        
        $cuenta->fill($request->all());
        $cuenta->save();
      return redirect('admin/admin/');

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

    public function storeFondos(Request $request)
    {

     
     //for ($i = count($request->num_cuenta) ; $i <=0; $i-- ) {
        
            foreach ($request->num_cuenta as $num_cuentas => $num_cuenta) {
                $cuenta = new Cuenta();
                $cuenta->num_cuenta = $num_cuenta;
                echo "$num_cuenta<br>";

                foreach ($request->ganancia as $ganancias => $ganancia) {
                    if ($num_cuentas == $ganancias ) {
                        $cuenta->ganancia = $ganancia;
                      echo "$ganancia<br>";
                    }          
                }

                foreach ($request->categoria as $categorias => $categoria) {
                      if ($num_cuentas == $categorias ) {
                        $cuenta->categoria = $categoria;
                       echo "$categoria<br>";
                    }
                } 
               $cuenta->user_id = $request->user_id;
               $cuenta->save();

            }
//dd($request->all());
        $user = User::find($request->user_id);
        $user->bandera = true;
        $user->save();

     return redirect()->route('users.index');
       
    }
}
