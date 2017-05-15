@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Nueva Cuenta de Ahorro </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
<div class="formulario container">
       
              <!--Encabezado -->
<div class="row">
                   <div class="col-lg-7 ">
                        <div class="input-group">
                          <input type="text" id="cedula-user" class="form-control" placeholder="Ingrese el número de documento del asociado">
                          <span class="input-group-btn">
                            <button id="busc-user-cuenta" class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                          </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->  

</div>
<hr>



<div class="resultadoAjax container" id="resultadoAjax">
          <div class="row">
           <table class="table" id="result-user" style="display: none">
             <thead>
              <th>Cédula</th>
              <th>Nombres</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Diligenciar</th>
             </thead>
             <tbody>
               <tr>
                 <td>
                  <label id="cedula"> </label>
                 </td>
                 <td>
                  <label id="nombres"> </label>
                 </td>
                 <td>
                  <label id="direccion"> </label>
                 </td>
                 <td>
                  <label id="telefono"> </label>
                 </td>
                 <td>
                  <label id="diligenciar"> <button class='btn btn-primary'><i class='fa fa-plus-square'></i></button> </label>
                 </td>
               </tr>
             </tbody>
           </table>

        
            <div class="alert alert-warning" role="alert" style="display: none" id="alert-not-found">
                       
</div>


<div class="formulario" id="formulario" style="display: none;">
  {!! Form::open(['url'=>['/admin/users/store/ajax'],'method'=>'POST']) !!}
      
            <table class="table table-user-reg">
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('type_doc','Tipo Doc') !!}
    {!! Form::select('type_doc',["cc"=>"Cedula Ciudadania","ce"=>"Cedula Extranjeria"],null,['class'=>'form-control tipo','required']) !!}
                 </div>
                </td>
                <td>
                  <div class="form-group">
      {!! Form::label('num_doc','No Documento') !!}
      {!! Form::text('num_doc',null,['class'=>'form-control tipo','placeholder'=>'No Documento','required','id'=>'num_doc','readonly']) !!}           
                 </div>                  
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
                  </div>
                </td>
                <td>
                  <div class="form-group">
    {!! Form::label('last_name','Apellidos') !!}
    {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
                  </div>                 
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('email','Correo') !!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@correo.com','required']) !!}
                  </div>
                </td>
                <td>
                  <div class="form-group">
    {!! Form::label('dir_res','Dirección') !!}
    {!! Form::text('dir_res',null,['class'=>'form-control','placeholder'=>'Dirección','required']) !!}
                 </div>               
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('telefono','Teléfono') !!}
    {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono','required']) !!}
                </div>
                </td>
                <td>
                  <div class="form-group">
    {!! Form::label('lug_exp_doc','Lug: Exp. Doc') !!}
    {!! Form::text('lug_exp_doc',null,['class'=>'form-control','placeholder'=>'Lugar de Expedicion Documento','required']) !!}
  
                   </div>              
                </td>
              </tr>
            </table>      
<div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
  </div>
  {!! Form::close() !!}
</div>


          </div><!--Fin row-->
            

</div>

 <div class="listado_cuentas" id="listado_cuentas">
    <div class="row">
      <div class="col-md-12">
        <h3>Listado de Cuentas</h3>
      </div>
    </div>
    <div class="row" align="center">
      <div class="col-md-2">
      <div class="form-group">
         No Cuenta
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
          Usuario
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        Saldo Anterior
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
         Saldo
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
         Accion
      </div>
    </div>
    </div>
    
@if(isset($cuentas))
    @foreach($cuentas as $cuenta)
      <!--Esta debe ser la consulta-->
  <div class="row" align="center">

    <div class="col-md-2">
      <div class="form-group">
         {{ $cuenta->num_cuenta  }}
      </div>
    </div>

<div class="col-md-2">
<div class="form-group">
     
         {{ ($cuenta->user->name)  }}
    
      </div>
</div>

  <div class="col-md-2">
      <div class="form-group">
    {{ $cuenta->saldo_anterior  }}
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    {{ $cuenta->saldo  }}
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
   <a href="/admin/cuentas/movimientos/view/{{ $cuenta->id }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Ver Movimientos"><i class="fa  fa-retweet"></i>
   </a>

   <a href="{{ url('admin/ingresos/add',$cuenta->num_cuenta) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Realizar Movimientos"><i class="fa   fa-database"></i>
   </a>

    <a href="{{ url('admin/ingresos/add',$cuenta->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa  fa-edit"></i>
   </a>
      </div>
    </div>
  </div><!--Fin-->       

      @endforeach
@endif

    

 </div>
    <hr>
    <hr>
 <!---->
 
 

          <!-- /.box-body -->
   </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
