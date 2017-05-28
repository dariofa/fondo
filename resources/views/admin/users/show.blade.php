@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
 
  @if(count($errors)>0)
  <div class="alertas-error alert alert-danger">
     <ul>
    @foreach($errors->all() as $error)
      <li> {{ $error }} </li>
    @endforeach
  </ul>
  </div>
@endif
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
                        <li><a href="{{ url('admin/cuentas/create',$user->id) }}">Nueva Cuenta</a></li>
                        <li><a href="{{ url('admin/creditos/create',$user->id) }}">Nuevo Credito</a></li>
                        <li><a href="{{ url('admin/cuentas',$user->id) }}">Ver Cuentas</a></li>
                        <li><a href="{{ url('admin/creditos/ver',$user->id) }}">Ver Creditos</a></li>
                        
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
			<li><a href="#3a" id="buscarInfProf" data-toggle="tab">Información Profesional</a>
			</li>
      <li><a href="#4a" id="buscarInfPerf" data-toggle="tab">Perfil</a>
      </li>
      <li><a href="#5a" id="buscarBienes" data-toggle="tab">Bienes</a>
      </li>
  		
		</ul> 
<hr>
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
                 <td>
                  <div class="form-group">
      {!! Form::label('pun_sisben','Puntaje Sisben') !!}
      {!! Form::text('pun_sisben',$user->pun_sisben,['class'=>'form-control tipo','placeholder'=>'Puntaje Sisben','required']) !!}           
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
    {!! Form::label('num_hijos','Hijos') !!}
    {!! Form::text('num_hijos',$user->num_hijos,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}
    
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
                 <td>
    {!! Form::label('est_laboral','Estado Laboral:') !!}
   {!! Form::select('est_laboral',['activo'=>'Activo','inactivo'=>'Inactivo'],$user->est_laboral,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}
              
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
                        <label for=""><h5>Dirección</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Cargo</h5></label>
                         </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group" id="direccion">
                        <label for=""><h5>Teléfono</h5></label>
                         </div>
                    </div>

                    <div class="col-md-1">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Sector o Barrio</h5></label>
                         </div>
                    </div>
                    <div class="col-md-1">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Salario</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Observaciones</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Acciones</h5></label>
                         </div>
                    </div>
                  </div>
                   
                    <div id="resultadoDa" class=" resulRef sombra">
                      
                    </div>
                  
                  </div>



               <hr>
            
                 
                 <div id="camposLab" class="container resulRef sombra">                

{!! Form::open(['route'=>['admin.users.agregarinflabo','user_id'=>$user->id],'method'=>'POST','id'=>'formGuaLab']) !!}
   
                  <div class="row">

                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('direccion','Dirección') !!}
    {!! Form::text('direccion',$user->direccion,['class'=>'form-control tipo','required','id'=>'direccion']) !!}
                         </div>
                    </div>

                    <div class="col-md-5">
                         <div class="form-group">
    {!! Form::label('cargo','Cargo:') !!}
    {!! Form::text('cargo',$user->cargo,['class'=>'form-control tipo','required','id'=>'cargo']) !!}
                         </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                         <div class="form-group">
    {!! Form::label('sector','Sector o Barrio') !!}
    {!! Form::text('sector',$user->sector,['class'=>'form-control tipo','required','id'=>'sector']) !!}
                         </div>
                    </div>

                    <div class="col-md-4">
                         <div class="form-group">
    {!! Form::label('telefono','Teléfono:') !!}
    {!! Form::text('telefono',null,['class'=>'form-control tipo','required','id'=>'telefono']) !!}
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group">
    {!! Form::label('salario','Salario:') !!}
    {!! Form::text('salario',null,['class'=>'form-control tipo','required','id'=>'telefono']) !!}
                         </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                         <div class="form-group">
    {!! Form::label('observaciones','Observaciones') !!}
    {!! Form::textarea('observaciones',$user->observaciones,['class'=>'form-control textarea','required','rows'=>'3','id'=>'observaciones']) !!}
                         </div>
                    </div>

                  </div>
          <div class="form-group">
                     {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnGuaLa']) !!}
                  </div>
           {!! Form::close() !!}
 

                 </div>
                 

           
 

				</div>
        <div class="tab-pane" id="3a">
          <div class="datosLabUs ">
                   <input type="text" value="{{ $user->id }}" id="user_id" hidden="true">
                    <div class="row">
                    <div class="col-md-2">
                         <div class="form-group" id="direccion">
                        <label for=""><h5>Nivel de Educación</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Titulo Obtenido</h5></label>
                         </div>
                    </div>
                    <div class="col-md-3">
                         <div class="form-group" id="direccion">
                        <label for=""><h5>Fecha Ob. Titulo</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Observaciones</h5></label>
                         </div>
                    </div>

                    <div class="col-md-2">
                         <div class="form-group" id="cargo">
                          <label for=""><h5>Acciones</h5></label>
                         </div>
                    </div>
                  </div>
                   
                    <div id="resultadoInf" class=" container resulRef sombra">
                      
                    </div>                  
                  </div>
                  <hr>
                  <div id="camposProf" class="resulRef sombra">                

{!! Form::open(['route'=>['admin.users.agregarinfprof','user_id'=>$user->id],'method'=>'POST','id'=>'formGuaLab']) !!}
   
                  <div class="row">

                    <div class="col-md-3">
                         <div class="form-group">
    {!! Form::label('nivel','Nivel de Educacion:') !!}
    {!! Form::text('nivel',$user->direccion,['class'=>'form-control tipo','required','id'=>'nivel']) !!}
                         </div>
                    </div>

                    <div class="col-md-3">
                         <div class="form-group">
    {!! Form::label('titulo','Titulo Obtenido:') !!}
    {!! Form::text('titulo',$user->cargo,['class'=>'form-control tipo','required','id'=>'titulo']) !!}
                         </div>
                    </div>

                    <div class="col-md-3">
                         <div class="form-group">
    {!! Form::label('fecha','Fecha Ob. Titulo') !!}
    {!! Form::date('fecha',$user->sector,['class'=>'form-control tipo','required','id'=>'fecha']) !!}
                         </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-9">
                         <div class="form-group">
    {!! Form::label('observaciones','Observaciones') !!}
    {!! Form::textarea('observaciones',$user->observaciones,['class'=>'form-control textarea','required','rows'=>'3','id'=>'observaciones']) !!}
                         </div>
                    </div>
                  </div>
          <div class="form-group">
                     {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnGuaLa']) !!}
                  </div>
           {!! Form::close() !!}
 

                 </div>
  
          
				</div>
          <div class="tab-pane" id="4a">
              <!-- Formulario Informacion personal -->
                    <div class="formulario">
  {!! Form::open(['route'=>['users.update','user_id'=>$user->id],'method'=>'put']) !!}
   {!! Form::hidden('user_id',$user->id) !!}           
        
            <table class="table table-user-reg">
              <tr>
                <td> 
                  <div class="form-group">
    {!! Form::label('type_doc','Tipo Doc.') !!}
    {!! Form::select('type_doc',['cc'=>'Cedula Ciudanania','ce'=>'Cedula Extranjeria'],$user->type_doc,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}
                 </div>
                </td>
                <td>
                  <div class="form-group">
      {!! Form::label('num_doc','No Documento') !!}
      {!! Form::text('num_doc',$user->num_doc,['class'=>'form-control tipo','placeholder'=>'Lugar de nacimiento','required']) !!}           
                 </div>                  
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('name','Nombres:') !!}
    {!! Form::text('name',$user->name,['class'=>'form-control tipo','placeholder'=>'Nombres','required']) !!} 
                  </div>
                </td>
                <td>
                  <div class="form-group">
    {!! Form::label('last_name','Apellidos:') !!}
    {!! Form::text('last_name',$user->last_name,['class'=>'form-control tipo','placeholder'=>'Apellidos','required']) !!} 
    
                  </div>                 
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
    {!! Form::label('email','E-Mail') !!}
    {!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'E-mail','required']) !!}
                  </div>
                </td>
                <td>
    {!! Form::label('direccion','Dirección Residencia:') !!}
    {!! Form::text('direccion',$user->dir_res,['class'=>'form-control tipo','required']) !!}
              
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

<div class="tab-pane" id="5a">
    <div class="datosBienes">
        <input type="text" value="{{ $user->id }}" id="user_id" hidden="true">
                    <div class="row">
                          <div class="col-md-5">
                               <div class="form-group" id="direccion">
                              <label for=""><h5>Observaciones</h5></label>
                               </div>
                          </div>

                          <div class="col-md-4">
                               <div class="form-group" id="cargo">
                                <label for=""><h5>Tipo</h5></label>
                               </div>
                          </div>
                          <div class="col-md-3">
                               <div class="form-group" id="cargo">
                                <label for=""><h5>Acciones</h5></label>
                               </div>
                          </div>
                  </div>
                   
                    <div id="resultadoBienes" class="container resultadoBienes sombra">
                      
                    </div>                  
                  
  </div>

<hr>
      <div class="formulario sombra">
         {!! Form::open(['route'=>['admin.users.add','user_id'=>$user->id],'method'=>'post']) !!}
           <div class="row">
                <div class="col-md-6">
                         <div class="form-group">
    {!! Form::label('tipo','Tipo') !!}
    {!! Form::select('tipo',['inmueble'=>'Inmueble','vehiculo'=>'Vehiculo','motocicleta'=>'Motocicleta','electrodomestico'=>'Electrodoméstico'],null,['class'=>'form-control','placeholder'=>'Seleccione...','required']) !!}    
    
                         </div>
                </div>
            </div>
           <div class="row">
                <div class="col-md-9">
                         <div class="form-group">
    {!! Form::label('name','Observaciones') !!}
    {!! Form::textarea('name',null,['class'=>'form-control','required','rows'=>'3','id'=>'name']) !!}
                         </div>
                </div>

                <div class="form-group col-md-6">
    {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                </div>
            </div>
          


         {!! Form::close() !!}
      </div>
  

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
