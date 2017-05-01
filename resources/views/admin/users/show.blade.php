@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Usuario: {{  $user->name }} {{ $user->last_name }} </h4><br>
            <label>Documento de Identidad: </label> <label>{{ $user->num_doc }}</label>
            <label>Teléfono: </label> <label>{{ $user->telefono }}</label>
            <label>Dirección Residencia: </label> <label>{{ $user->dir_res }}</label>
             
             <div class="caja-btn-herr">
              <div class="dropdown">
                      <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-cog"></i>
                        
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('admin/ingresos/create',$user->id) }}">Nuevo Ingreso</a></li>
                        <li><a href="#">Nuevo Credito</a></li>
                        
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                </div>       
            </div>
               
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
    		
<div id="exTab1" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#1a" data-toggle="tab">Información Personal</a>
			</li>
			<li><a href="#2a" id="buscarInfLabo" data-toggle="tab">Información laboral </a>
			</li>
			<li><a href="#3a" data-toggle="tab">Información Profesional</a>
			</li>
  		
		</ul> 

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1a">
          	
          	<!-- Formulario Informacion personal -->
				            <div class="formulario">
  {!! Form::open(['route'=>['admin.users.updateper',$user->id],'method'=>'POST']) !!}
      
            <table class="table table-user-reg">
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('fecha_nac','Fecha de Nacimiento') !!}
    {!! Form::date('fecha_nac',$user->fecha_nac,['class'=>'form-control tipo','required']) !!}
                 </div>
                </td>
                <td>
                  <div class="form-group">
      {!! Form::label('lug_nac','Lugar de Nacimiento') !!}
      {!! Form::text('lug_nac',$user->lug_nac,['class'=>'form-control tipo','placeholder'=>'Lugar de nacimiento','required']) !!}           
                 </div>                  
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('est_civil','Estado Civil') !!}
    {!! Form::select('est_civil',['soltero'=>'Soltero','casado'=>'Casado'],$user->est_civil,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}
                  </div>
                </td>
                <td>
                  <div class="form-group">
    {!! Form::label('eps','EPS') !!}
    {!! Form::select('eps',['emsanar'=>'Emssanar','colsanitas'=>'Colsanitas'],$user->eps,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}
    
                  </div>                 
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('celular','No Celular') !!}
    {!! Form::text('celular',$user->celular,['class'=>'form-control','placeholder'=>'Celular','required']) !!}
                  </div>
                </td>
                <td>
    {!! Form::label('telefono','Teléfono:') !!}
    {!! Form::text('telefono',$user->telefono,['class'=>'form-control tipo','required']) !!}
              
                </td>
              </tr>
              
            </table>      
<div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
  </div>
  {!! Form::close() !!}
</div>

          	<!-- Fin Formulario Informacion personal -->




				</div>
				<div class="tab-pane" id="2a">
        
        
      
						       <div class="datosLabUs">
                   <input type="text" value="{{ $user->id }}" id="user_id" hidden="true">
                    <div class="row">
                    <div class="col-md-2">
                         <div class="form-group" id="direccion">
                        <label for="">Dirección</label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for="">Cargo</label>
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group" id="direccion">
                        <label for="">Teléfono</label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for="">Sector o Barrio</label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for="">Observaciones</label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for="">Acciones</label>
                         </div>
                    </div>
                  </div>
                   
                    <div id="resultadoDa">
                      
                    </div>
                  
                  </div>



               <hr>
           
                 
                 <div id="campos">                

{!! Form::open(['route'=>['admin.users.agregarinflabo',$user->id],'method'=>'POST','id'=>'form']) !!}

                  <div class="row">
                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('direccion','Dirección') !!}
    {!! Form::text('direccion',$user->direccion,['class'=>'form-control tipo','required']) !!}
                         </div>
                    </div>

                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('cargo','Cargo:') !!}
    {!! Form::text('cargo',$user->cargo,['class'=>'form-control tipo','required']) !!}
                         </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('sector','Sector o Barrio') !!}
    {!! Form::text('sector',$user->sector,['class'=>'form-control tipo','required']) !!}
                         </div>
                    </div>

                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('telefono','Teléfono:') !!}
    {!! Form::text('telefono',null,['class'=>'form-control tipo','required']) !!}
                         </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                         <div class="form-group">
    {!! Form::label('observaciones','Observaciones') !!}
    {!! Form::textarea('observaciones',$user->observaciones,['class'=>'form-control textarea','required','rows'=>'3']) !!}
                         </div>
                    </div>

                  </div>
          <div class="form-group">
                     {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                  </div>
           {!! Form::close() !!}
 

                 </div>
                 

           
 

				</div>
        <div class="tab-pane" id="3a">
          
  
          
				</div>
          <div class="tab-pane" id="4a">
          
				</div>
			</div>
  </div>
       </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
    
  </div>
@endsection
