<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientoTipo;
use Laracasts\Flash\Flash;

class IngresosTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $tipos_movimientos = MovimientoTipo::orderBy('id','ASC')->paginate(10);
       return view('admin.tipos.ingresos',['tipos_movimientos'=>$tipos_movimientos]);
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
        $tipo = new MovimientoTipo($request->all());
        $tipo -> save();
       // return response()->json($tipo);    
       Flash::success('La Información  ha sido agregada con exito');
      return  redirect('admin/tipos/ingresos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tipos_movimientos = MovimientoTipo::find($request->id);
        //dd($request->all());
        return response()->json($tipos_movimientos);
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
        $movimientos = MovimientoTipo::find($request->id);
        $movimientos->fill($request->all());
        $movimientos->save();
         return  redirect('admin/tipos/ingresos/');
       // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimientos = MovimientoTipo::find($id);
        $movimientos->delete();
        return  redirect('admin/tipos/ingresos/');    }

     public function buscarAjax(Request $request){
      $movimientos = MovimientoTipo::where('tipo', '=',($request->num_cuenta))->where('categoria', '<>','credito')->get();
        //dd($request->all());
        return response()->json($movimientos);
        
    }
}
