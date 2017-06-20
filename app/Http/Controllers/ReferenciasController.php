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
            //$creditos->referencia_tipo;                        
        });

      //$referencia =  Referencia::find(10);
        //$num = count($creditos->referencias);
        //dd($creditos->referencias_tipo);
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
         //dd($request->all());
        $bandera = false;
        if (!$request->has("referencia_id")){            
        $tipo_ref = ReferenciaTipo::orderBy("id","ASC")->pluck('name','id');       
        $creditos = Credito::find($request->credito_id);
        $referencia = new Referencia($request->all());
        $referencia->save();        
        $creditos->referencias()->attach($referencia->id,[
            'referencia_tipo_id'=>$request->referencias_tipo_id,
            'parentesco'=>$request->parentesco
            ]);

         }else{
            $referencia = Referencia::find($request->referencia_id);
            $creditos = Credito::find($request->credito_id);            
            if (count($creditos->referencias) > 0) {

                for ($i=0; $i < count($creditos->referencias) ; $i++) { 
               
                    if ($creditos->referencias[$i]->id == $request->referencia_id) {
                     $bandera = true;
                    }
                }
            }
           
  if ($bandera) {
    flash::success('La referencia para el  '.$creditos->num_credito.' ya existe');
      return redirect()->route('admin.referencias.create',['creditos'=>$creditos]);
}else{
    $creditos->referencias()->attach($referencia->id,['referencia_tipo_id'=>$request->referencias_tipo_id,'parentesco'=>$request->parentesco]);    
    }
 
        }

        

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

     public function searchAjax(Request $request)
    {
        //dd( $request->num_doc);
        $referencia = Referencia::where('num_doc','=',$request->num_doc)->orWhere('id','=',$request->id)->get();

        //dd($referencia);
        return response()->json($referencia); 



    }
     public function delete($idRef,$idCred)
    {
        $creditos = Credito::find($idCred);
        $creditos->referencias()->detach($idRef);
       flash::success('La referencia para el  '.$creditos->num_credito.' ha sido registrado con exito');
       return redirect()->route('admin.referencias.create',['creditos'=>$creditos]);
    }
}
