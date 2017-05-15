<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Bien;
use App\User;
class BienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $bienes = Bien::orderBy('id','ASC')->where('user_id','=', $request->id)->get();
        return response()->json($bienes); 
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
        $user = User::find($request->user_id);
        $bien = new Bien($request->all());
        $bien->save();
        Flash::success('El bien para el usuario: '.$user->name.' ha sido agregado con exito');
        return redirect()->route('users.show',['user'=>$user]);
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
    public function update(Request $request)
    {
        $bien = Bien::find($request->id);
        $bien->fill($request->all());
        $bien->save();
//dd($request->all());
        $user = $bien->user;
        Flash::success('El bien para el usuario: '.$user->name.' ha sido modificado con exito');
        return redirect()->route('users.show',['user'=>$user]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bien = Bien::find($id);
       $bien->delete();
       $user = $bien->user;
        Flash::success('El bien para el usuario: '.$user->name.' ha sido eliminado con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }
}
