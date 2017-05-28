<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreditoTipo;

class CreditosTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $creditos_tipo = CreditoTipo::orderBy('id','ASC')->paginate(10);
      return view('admin.tipos.creditos',['creditos_tipo'=>$creditos_tipo]);
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
   public function searchTasa(Request $request)
   {
        $creditos_tipo = CreditoTipo::find($request->id);
        return response()->json($creditos_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $tipo_credito = new CreditoTipo($request->all());
        $tipo_credito->save();
        return  redirect('admin/tipos/creditos/');
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
        $creditos_tipo = CreditoTipo::find($request->id);
        return response()->json($creditos_tipo);
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
        $creditos_tipo = CreditoTipo::find($request->id);
        $creditos_tipo->fill($request->all());
        $creditos_tipo->save();
        return  redirect('admin/tipos/creditos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creditos_tipo = CreditoTipo::find($id);
        $creditos_tipo->delete();
        
        return  redirect('admin/tipos/creditos/');
    }
}
