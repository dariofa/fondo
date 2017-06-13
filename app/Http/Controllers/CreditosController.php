<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\User;
use App\Credito;
use App\ReferenciaTipo;
use App\Referencia;
use App\MovimientoCredito;
use Laracasts\Flash\Flash;
class CreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditos = Credito::orderBy("id",'ASC')->get();
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;                          
        });

        //dd($creditos);
        return view('admin.creditos.index',['creditos'=>$creditos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find($id);
        $cuentas = Cuenta::orderBy('id','ASC')->where('user_id','=',$id)->where('saldo','>',500000)->get();
        $cuentas ->each(function($cuentas){
            $cuentas->user;
            $cuentas->creditos;                          
        });
        $creditos = Credito::all();
        $num_credito = count($creditos)+1;

    return view('admin.creditos.create',['cuentas'=>$cuentas,'user'=>$user,'num_credito'=>$num_credito]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credito = new Credito($request->all());
        $credito->save();
        flash::success('Credito '.$request->n.' registrado con exito');
       return  redirect('admin/creditos/');
    }
     public function changeStatus($id,$status)    {
        $credito = Credito::find($id);
        $credito->estado = $status;
        if ($status == 'operando') {
            $credito->fecha_act = date('Y-m-d');
        }
        $credito->save();

        if ($status=='inactivo') {
           $movimientos = MovimientoCredito::where('credito_id','=',$id);
           $movimientos->delete();
           
        }

        //dd($id);

        flash::success('El Credito ha sido '.$status.' con exito');
       return  redirect('admin/creditos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_ref = ReferenciaTipo::orderBy("id","ASC")->pluck('name','id');
        $creditos = Credito::find($id);
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;
            $creditos->movimientos;
            $creditos->cuenta;                          
        });

       $movimiento = new MovimientoCredito();
       $num_cuotas = $creditos->nu_cuotas;
       $valor = ceil($creditos->saldo / $num_cuotas);
       //$fecha_act = $creditos->fecha_act;
       //dd($creditos->forma_pago);
       if ($creditos->forma_pago=='mensual') {
           $forma_pago = "+ 31 days";
       }elseif($creditos->forma_pago=='quincenal'){
        $forma_pago = "+ 16 days";
       }elseif($creditos->forma_pago=='semanal'){
        $forma_pago = "+ 8 days"; 
       }elseif($creditos->forma_pago=='diario'){
        $forma_pago = "+ 1 days";
       }

     // dd($creditos->cuenta->ganancia);
       
       $ahorro = $creditos->getAhorro($creditos->cuenta->ganancia);
       $listado = $movimiento->parrilla($num_cuotas,$valor,$forma_pago);

     return view('admin.creditos.show',['creditos'=>$creditos,'tipo_ref'=>$tipo_ref,'listado'=>$listado,'ahorro'=>$ahorro]);
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

     public function ver($id)
    {
        $creditos = Credito::where('user_id','=',$id)->get();
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;
            $creditos->movimientos;
            $creditos->cuenta;                          
        });
        return view('admin.creditos.ver',['creditos'=>$creditos]);
    }
}
