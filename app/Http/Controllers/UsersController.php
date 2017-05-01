<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller 
{

    public function buscarUsersAjax(Request $request){

        $user = User::where('num_doc', '=',($request->cedula))->firstOrFail();
        return response()->json($user);        
      } 

      public function buscarUsersInfoLabo(Request $request){
        $user = User::find($request->id);
        $inf_labo = $user->inf_labo;
        $inf_labo=json_decode($inf_labo);
        return response()->json($inf_labo);        
      } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::id();
        $users = User::orderBy('id','ASC')->where('id','<>', $id)->paginate(4);
        return view('admin.users.index',["users"=>$users]) ;
           }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.users.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user -> save();
       
        flash::success('Usuario '.$user->name.' registrado con exito');
       return redirect()->route('users.index');

           }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
      return view('admin.users.show',['user'=>$user]);
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
    public function agregarinflabo(Request $request, $id)
    {
        $user = User::find($id); 
        $inf_labo = $user->inf_labo;
        $inf_labo=json_decode($inf_labo);
        $inf_labo=(array) $inf_labo;
        $NewLabo = (array) $request->all();        
        array_push($inf_labo,$NewLabo);
        $inf_labo = json_encode($inf_labo);
        $user->inf_labo = $inf_labo;
        $inf_laboral = json_decode($user->inf_labo);        //
       $user->save();
       
      Flash::success('La Información laboral del usuario: '.$user->name.' ha sido agregada con exito');
       
      return redirect()->route('users.show',['user'=>$user]);
    }

     public function editarinflabo(Request $request, $id)
    {
        dd(json_encode($id));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfPersonal(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Flash::success('La Información personal del usuario: '.$user->name.' ha sido agregada con exito');
        return redirect()->route('users.show',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $cadena = json_encode($request->all());
        $user->inf_labo = $cadena ;     
        $user->save();
        return $cadena;
        
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
