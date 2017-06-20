<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientoCredito;
use App\MovimientoCuenta;
use App\Credito;
use App\Cuenta;
class MovimientosCreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = Cuenta::find($request->cuenta_id);
        //dd($cuenta);
        $credito = Credito::find($request->credito_id);
        $credito->estado = 'operando';
        $credito->fecha_act = date('Y-m-d');
        $credito->save();
        $datos = $request->all();



        foreach ($request->fecha as $fechas => $fecha) {
            foreach ($request->valor as $valores => $valor) {
                $movimiento = new MovimientoCredito();
                $movimiento->movimiento_tipo_id = $request->movimiento_tipo_id;
                $movimiento->credito_id = $request->credito_id;
                $movimiento->valor = $valor;
                $movimiento->fecha = $fecha;
                $movimiento->save();

               break;
            }
        }


return redirect('admin/creditos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creditos = Credito::find($id);
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;
            $creditos->movimientos; 
            $creditos->cuenta;                          
        });

        $movimientos =  MovimientoCredito::where('credito_id','=',$id)->get();
        $movimientos ->each(function($movimientos){
            $movimientos->credito;
            $movimientos->movimiento_tipo; 
        });

       $ahorro = $creditos->getAhorro($creditos);
       // dd($movimientos);
        
        return view('admin.movi_creditos.index',['creditos'=>$creditos,'movimientos'=>$movimientos,'ahorro'=>$ahorro]);
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
    public function update(Request $request)
    {
     //dd($request->all());
        $total_pago = 0;
        foreach ($request->id as $key => $value) {
               $movimiento = MovimientoCredito::find($value);
               $movimiento->estado = 'pagada';
               $movimiento->save();            
              
           
        }

        foreach ($request->valor as $key => $value) {
            $total_pago += $value;            
             
        }
        $credito = Credito::find($request->credito_id);
        $saldo_anterior = $credito->saldo;
        $new_saldo = $saldo_anterior - $total_pago;
        $credito->saldo = $new_saldo;
        if ($credito->saldo <= 0) $credito->estado = 'pagado';
        $credito->save();
        $ahorro = $credito->getAhorro($credito);


        if ($credito->saldo <= 0) {
           $cuenta = Cuenta::find($request->cuenta_id);
           $saldo_anterior =  $cuenta->saldo_anterior;
           $saldo_actual = $cuenta->saldo;
           $new_saldo = $saldo_actual + $ahorro;
           $cuenta->saldo_anterior = $saldo_actual;
           $cuenta->saldo =  $new_saldo;                   
           $cuenta->save();
           $Mcuenta = new MovimientoCuenta();
           $Mcuenta->movimiento_tipo_id = $request->movimiento_tipo_id;
           $Mcuenta->cuenta_id = $request->cuenta_id;
           $Mcuenta->mes = date('Y-m-d');
           $Mcuenta->valor = $ahorro;
           $Mcuenta->save();
           //dd($saldo_actual);
        }
      
      return redirect('admin/ingresos/creditos/view/'.$request->credito_id);  
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
