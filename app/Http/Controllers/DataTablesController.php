<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MovimientoTipo;
use App\CuentaTipo;
use App\CreditoTipo;
use App\ReferenciaTipo;
use App\MovimientoCuenta;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;


class DataTablesController extends Controller
{
    public function listarUsers()    {
       $id = Auth::id(); 
      $model = User::orderBy('id','ASC')->where('id','<>',$id)->get();
      $mensaje = '¿Esta seguro de eliminar el registro\n Se eliminaran todos los datos asociados\nCuentas; Creditos';
      //$model = User::orderBy('id','ASC')->where('id','<>', $id);
        
      //return view('admin.users.index','users'=>$users);


  return Datatables::collection($model)->addColumn('intro',function($model){
    	$boton = '<a href="/admin/users/'.$model->id.'">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="/admin/users/delete/'.$model->id.'" onclick=\'return confirm("¿Está seguro de eliminar el registro?\nSe eliminaran todos los datos asociados a el.\nCuentas de ahorro, creditos y demas...")\'>
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>';
    	return  ($boton);
    })->make(true);
}

public function listarTiposIngresos()    {
        
      $model = MovimientoTipo::all();
      //$id = IngresoTipo::id();
      //$model = User::orderBy('id','ASC')->where('id','<>', $id);
        
      //return view('admin.users.index','users'=>$users);


  return Datatables::collection($model)->addColumn('intro',function($model){
      $boton = '<a href="#">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                        ';
      return  ($boton);
    })->make(true);
}

public function listarTiposCuentas()    {
        
      $model = CuentaTipo::all();
      //$id = IngresoTipo::id();
      //$model = User::orderBy('id','ASC')->where('id','<>', $id);
        
      //return view('admin.users.index','users'=>$users);


  return Datatables::collection($model)->addColumn('intro',function($model){
      $boton = '<a href="#">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                        ';
      return  ($boton);
    })->make(true);
}

public function listarTiposCreditos()    {        
      $model = CreditoTipo::all();
      return Datatables::collection($model)->addColumn('intro',function($model){
      $boton = '<a href="#">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                        ';
      return  ($boton);
    })->make(true);
}

public function listarTiposReferencias()    {        
      $model = ReferenciaTipo::all();
      return Datatables::collection($model)->addColumn('intro',function($model){
      $boton = '<a href="#">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                        ';
      return  ($boton);
    })->make(true);
}
}