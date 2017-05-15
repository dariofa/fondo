<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Credito;
use App\ReferenciaTipo;
use App\Referencia;
use App\User;

class ReferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $tipo_ref = ReferenciaTipo::orderBy("id","ASC")->pluck('name','id');
        $creditos = Credito::find($id);
        $creditos ->each(function($creditos){
            $creditos->user;
            $creditos->credito_tipo; 
            $creditos->referencias;                          
        });
        //$num = count($creditos->referencias);
        //dd($num);
        return view('admin.ref_creditos.index',['creditos'=>$creditos,'tipo_ref'=>$tipo_ref]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_ref = ReferenciaTipo::orderBy("id","ASC")->pluck('name','id');
        //dd($request->all());
        $creditos = Credito::find($request->num_credito);
        $referencia = new Referencia($request->all());
        $referencia->save();
        $creditos->referencias()->attach($referencia->id);


        flash::success('La referencia para el  '.$creditos->num_credito.' ha sido registrado con exito');
        return redirect()->route('admin.referencias.create',['creditos'=>$creditos]);
        
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
