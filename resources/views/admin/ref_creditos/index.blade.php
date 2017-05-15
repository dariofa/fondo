@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-11 ">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Credito:: {{ $creditos->num_credito }}</h3>
            <h4>Titular:: {{ $creditos->user->name }} {{ $creditos->user->last_name }}
             Teléfono {{ $creditos->user->telefono }}
             </h4>
              <h4>Estado del Credito:: {{ $creditos->estado }}</h4>  
          
            @if($creditos->estado == 'inactivo')
                <a href="/admin/creditos/change/status/{{ $creditos->id }}/activo" class="btn btn-success">Activar</a>
                @else
                  <a href="/admin/creditos/change/status/{{ $creditos->id }}/inactivo" class="btn btn-success">Inactivar</a>          
            @endif
            

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
                          <a  href="#1a" data-toggle="tab" id="buscarBienes">Bienes</a>
                        </li>
                        <li><a href="#2a" id="buscarInfLabo" data-toggle="tab">Referencias</a>
                        </li>
                        <li><a href="#3a" id="buscarInfProf" data-toggle="tab">XXXXXX</a>
                        </li>
                        <li><a href="#4a" id="buscarInfPerf" data-toggle="tab">XXXXXX</a>
                        </li>
                        
                      </ul> 
                  <hr>
                        <div class="tab-content clearfix">
                         
                          <div class="tab-pane active" id="1a">
    <div class="container">
      <div class="row">
    <div class="col-md-3">
      <h5>Tipo de bien:</h5>
    </div>
  <div class="col-md-3">
      <h5>Observaciones:</h5>
  </div>
  
  </div>
      @foreach($creditos->user->bienes as $bien)          
   <div class="row">
          <div class="col-md-3">
            <h5>{{ $bien->tipo }}</h5>
          </div>
        <div class="col-md-3">
            <h5>{{ $bien->name }}:</h5>
        </div>
  
  </div>
      @endforeach


    </div><!--fin container -->
                          </div>

                           <div class="tab-pane" id="2a">
<div class="container sombra" id="resultadoReferencias">
  <div class="row">
    <div class="col-md-3">
      <h5>Nombres:</h5>
    </div>
  <div class="col-md-2">
      <h5>Dirección:</h5>
  </div>
  <div class="col-md-1">
      <h5>Teléfono:</h5>
  </div>
  <div class="col-md-1">
      <h5>Parentesco:</h5>
  </div>
  <div class="col-md-1">
      <h5>Estado Laboral:</h5>
  </div>
  <div class="col-md-2">
      <h5>Tipo de Referencia:</h5>
  </div>
  <div class="col-md-2">
      <h5>Acciones:</h5>
  </div>
  </div>

 @foreach($creditos->referencias as $referencia)
  <div class="row">
     <div class="col-md-3">
      <b> {{ $referencia->name }} </b>
      <b> {{ $referencia->last_name }} </b>
     </div>
     <div class="col-md-2">
      <b> {{ $referencia->direccion }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->telefono }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->parentesco }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->est_laboral }} </b>
     </div>
     <div class="col-md-2">
      <b> {{ ($referencia->referencia_tipo->name) }} </b>
     </div>
      <div class="col-md-2">
      <div class="form-group">

   <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa  fa-edit"></i>
   </a>

   <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa  fa-trash"></i>
   </a>
      </div>
     </div>
     
  </div>
 @endforeach 
</div>

<hr>

<div class="container sombra">
{!! Form::open(['route'=>['referencias.store','num_credito'=>$creditos->id],'method'=>'post']) !!}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">     
    {!! Form::label('referencias_tipo_id','Tipo de referencia') !!}
    {!! Form::select('referencias_tipo_id',$tipo_ref,null,['class'=>'form-control','required','id'=>'referencias_tipo_id']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('type_doc','Tipo Doc') !!}
    {!! Form::select('type_doc',["cc"=>"Cedula Ciudadania","ce"=>"Cedula Extranjeria"],null,['class'=>'form-control tipo','required']) !!}
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('num_doc','No Documento') !!}
      {!! Form::text('num_doc',null,['class'=>'form-control tipo','placeholder'=>'No Documento','required']) !!}           
      </div> 
    </div>

    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('lug_exp_doc','Lugar Exp. Documento') !!}
    {!! Form::text('lug_exp_doc',null,['class'=>'form-control tipo','required','placeholder'=>'Lugar Exp. Documento']) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('name','Nombres') !!}
    {!! Form::text('name',null,['class'=>'form-control tipo','placeholder'=>'Nombres','required']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('last_name','Apellidos') !!}
      {!! Form::text('last_name',null,['class'=>'form-control tipo','placeholder'=>'Apellidos','required']) !!}           
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('direccion','Dirección') !!}
    {!! Form::text('direccion',null,['class'=>'form-control tipo','placeholder'=>'Dirección','required']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('telefono','Teléfono') !!}
      {!! Form::text('telefono',null,['class'=>'form-control tipo','placeholder'=>'Teléfono','required']) !!}           
      </div> 
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('email','E-mail') !!}
      {!! Form::email('email',null,['class'=>'form-control tipo','placeholder'=>'example@correo.com','required']) !!}           
      </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('parentesco','Parentesco') !!}
    {!! Form::text('parentesco',null,['class'=>'form-control tipo','placeholder'=>'Parentesco','required']) !!}
      </div>
    </div>    
  </div>

  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('est_laboral','Estado laboral') !!}
      {!! Form::select('est_laboral',["activo"=>"Activo","inactivo"=>"Inactivo"],null,['class'=>'form-control tipo','required']) !!}       
      </div> 
    </div>
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('ing_mensuales','Ingresos Aprox. Mensuales') !!}
    {!! Form::text('ing_mensuales',null,['class'=>'form-control tipo','placeholder'=>'Parentesco','required']) !!}
      </div>
    </div>    
  </div>
  <div class="row">
   <div class="col-md-6">
    <div class="form-group">
    {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
  </div>
  </div>
  </div>
{!! Form::close() !!}
</div>

                          </div>

                           <div class="tab-pane" id="3a">
      <h3>hola 3</h3>
                          </div>

                           <div class="tab-pane " id="4a">
      <h3>hola 4</h3>
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