<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientoCuenta;
use App\User;
use App\Cuenta;

class IngresosCuentasController extends Controller
{ 
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {

        $cuentas = MovimientoCuenta::orderBy("id","ASC")->get();
        $cuentas ->each(function($cuentas){
            $cuentas->cuenta;
            $cuentas->ingresos_tipo;
                           
        });


       //$total_ing = MovimientoCuenta::orderBy("id","ASC")->where('tipo','<>','')->get();

        
        return view('admin.ingresos_cuentas.index',['cuentas'=>$cuentas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($num_cuenta)
    {

        $cuenta = Cuenta::where('num_cuenta', '=',$num_cuenta)->firstOrFail();
         return view('admin.ingresos_cuentas.create',['cuenta'=>$cuenta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datos = $request->all();

        
        if ($request->has("cuenta_id")){
            $num_cuenta = $request->input("cuenta_id");
        }
        $movimiento_tipo = $request->input("ingreso_tipo");
       // dd($datos);
 $contador = 0;
foreach ($datos as $key => $value) {  
    if (is_array($value)) {  
        $bandera = false;    
        $Mcuenta = new MovimientoCuenta();    
         $nombres = array_column($datos, $contador); 
         //dd($nombres);
        foreach ($nombres as $key => $value) {
                 
                 if ($key == 0) {                    
                    $Mcuenta->movimiento_tipo_id = $value;
                }
                 if ($key == 1) {                    
                    $Mcuenta->mes = $value;
                 }
                 if ($key == 2) {                    
                    $Mcuenta->valor = $value;
                }
                 $Mcuenta->cuenta_id = $num_cuenta;
                 $Mcuenta->save();  

            if ($movimiento_tipo==0 and $Mcuenta->valor != "" and $movimiento_tipo!="") {
                   $cuenta = Cuenta::find($num_cuenta);
                   $saldo_anterior =  $cuenta->saldo_anterior;
                   $saldo_actual = $cuenta->saldo;
                   $new_saldo = $saldo_actual + $Mcuenta->valor;
                   $cuenta->saldo_anterior = $saldo_actual;
                   $cuenta->saldo =  $new_saldo;                   
                   $cuenta->save();
                  }

               if ($movimiento_tipo==2 and $Mcuenta->valor != "" and $movimiento_tipo!="") {
                   $cuenta = Cuenta::find($num_cuenta);
                   $saldo_anterior =  $cuenta->saldo_anterior;
                   $saldo_actual = $cuenta->saldo;
                   $new_saldo = $saldo_actual - $Mcuenta->valor;

                   $cuenta->saldo_anterior = $saldo_actual;
                   $cuenta->saldo =  $new_saldo;                   
                   $cuenta->save();
                   //dd("SIii");
                  }     
             
        }

             //dd($cuenta);
                   
      $contador++;
    }

}
        return redirect()->route('cuentas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Mcuenta =  MovimientoCuenta::where('cuenta_id', '=',$id)->get();
        $Mcuenta ->each(function($Mcuenta){
            $Mcuenta->cuenta;
            $Mcuenta->ingresos_tipo;
                         //   
    });
        //dd($Mcuenta);
    return view('admin.ingresos_cuentas.index',['Mcuenta'=>$Mcuenta]);

        //
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
        //
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