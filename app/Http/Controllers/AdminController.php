<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminIngreso;
use App\User;
use App\Ingreso;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIngresos()
    {
    /*    
        $usersAdmin = DB::table('admin_ingresos')
           ->leftJoin('users', 'users.id', '=', 'admin_ingresos.user_id')
           ->leftJoin('ingresos', 'ingresos.user_id', '=', 'users.id')
           //->leftJoin('users', 'users.id', '=', 'ingresos.user_id')
            
            ->get(); 

       dd($users) ; */    

         $usersRegistros = DB::table('admin_ingresos')
           ->leftJoin('ingresos', 'ingresos.id', '=', 'admin_ingresos.ingresos_id')
           ->leftJoin('users', 'users.id', '=', 'ingresos.user_id')
           //->leftJoin('users', 'users.id', '=', 'ingresos.user_id')
            
            ->get(); 

       dd($usersRegistros) ;     
       /* $adminIngresos = AdminIngreso::all();

        $adminIngresos->each(function($adminIngresos){
        $adminIngresos->user;
           
            //dd($adminIngresos->ingreso);

        });

           

        $user = User::all();
//dd($user->ingresos);
        $user->each(function($user){
        $user->ingresos;
            $user->ingresos;
            dd($user->ingresos);

        });*/
     //return view('admin.ingresos.show',['ingresos'=>$ingresos]) ;
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
        //
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
