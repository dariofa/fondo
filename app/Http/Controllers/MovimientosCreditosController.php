<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientoCredito;
use App\Credito;
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
        $credito = Credito::find($request->credito_id);
        $credito->estado = 'operando';
        $credito->fecha_act = date('Y-m-d');
        $credito->save();
        $datos = $request->all();
        //$datos = array('fecha' =>'','valor'=>'');
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
       // dd($movimientos);
        
        return view('admin.movi_creditos.index',['creditos'=>$creditos,'movimientos'=>$movimientos]);
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
