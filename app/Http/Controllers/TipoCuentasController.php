<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentaTipo;
use Laracasts\Flash\Flash;


class TipoCuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_cuentas = CuentaTipo::all();
       return view('admin.tipos.cuentas',['tipo_cuentas'=>$tipo_cuentas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_cuenta = new CuentaTipo($request->all());
        $tipo_cuenta->save();
        return  redirect('admin/tipos/cuentas/');
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
        $cuenta = CuentaTipo::find($request->id);
       // dd($cuenta);
       return response()->json($cuenta); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)    {
        $tipo_cuenta = CuentaTipo::find($request->id);
        $tipo_cuenta->name = $request->name;
        $tipo_cuenta->save();
        Flash::success('La Información ha sido editada con exito');
       
        return  redirect('admin/tipos/cuentas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_cuenta = CuentaTipo::find($id);
        $tipo_cuenta->delete();
        Flash::success('La Información ha sido eliminada con exito');       
        return  redirect('admin/tipos/cuentas/');
    }
}
