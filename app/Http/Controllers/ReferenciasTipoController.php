<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReferenciaTipo;

class ReferenciasTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referencias_tipo = ReferenciaTipo::orderBy('id','ASC')->paginate(10);
       return view('admin.tipos.referencias',['referencias_tipo'=>$referencias_tipo]);
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
      $referencia = new ReferenciaTipo($request->all());
      $referencia->save();
      return  redirect('admin/tipos/referencias/');
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
        $referencia = ReferenciaTipo::find($request->id);
        return response()->json($referencia);
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
        $referencias_tipo = ReferenciaTipo::find($request->id);
        $referencias_tipo->fill($request->all());
        $referencias_tipo->save();
        return  redirect('admin/tipos/referencias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referencias_tipo = ReferenciaTipo::find($id);
        $referencias_tipo->delete();
        return  redirect('admin/tipos/referencias/');
    }
}
