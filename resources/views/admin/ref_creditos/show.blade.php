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
            <h3>Referencias</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          
        <div class="container sombra" id="form-ref">
{!! Form::open(['url'=>['/admin/referencias/update','id'=>$referencia->id],'method'=>'post','id'=>'form-add-ref']) !!}
  <div class="row">
  
    <div class="col-md-6">
      <div class="form-group">     
   {!! Form::label('num_doc','No Documento') !!}
      {!! Form::text('num_doc',$referencia->num_doc,['class'=>'form-control num_documento','placeholder'=>'No Documento','required','id'=>'num_docu']) !!} 

      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('type_doc','Tipo Doc') !!}
    {!! Form::select('type_doc',["cc"=>"Cedula Ciudadania","ce"=>"Cedula Extranjeria"],$referencia->type_doc,['class'=>'form-control tipo','required','id'=>'type_doc']) !!}
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
       {!! Form::label('name','Nombres') !!}
    {!! Form::text('name',$referencia->name,['class'=>'form-control tipo','placeholder'=>'Nombres','required','id'=>'name']) !!}
     </div> 
    </div>

    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('lug_exp_doc','Lugar Exp. Documento') !!}
    {!! Form::text('lug_exp_doc',$referencia->lug_exp_doc,['class'=>'form-control tipo','required','placeholder'=>'Lugar Exp. Documento','id'=>'lug_exp_doc']) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('last_name','Apellidos') !!}
      {!! Form::text('last_name',$referencia->last_name,['class'=>'form-control tipo','placeholder'=>'Apellidos','required','id'=>'last_name']) !!}   

    </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
            {!! Form::label('est_laboral','Estado laboral') !!}
      {!! Form::select('est_laboral',["activo"=>"Activo","inactivo"=>"Inactivo"],$referencia->est_laboral,['class'=>'form-control tipo','required']) !!}    
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
    {!! Form::label('direccion','Dirección') !!}
    {!! Form::text('direccion',$referencia->direccion,['class'=>'form-control tipo','placeholder'=>'Dirección','required','id'=>'direccion']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('telefono','Teléfono') !!}
      {!! Form::text('telefono',$referencia->telefono,['class'=>'form-control tipo','placeholder'=>'Teléfono','required','id'=>'telefono']) !!}           
      </div> 
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
      {!! Form::label('email','E-mail') !!}
      {!! Form::email('email',$referencia->email,['class'=>'form-control tipo','placeholder'=>'example@correo.com','required','id'=>'email']) !!}           
      </div> 
    </div>
    <div class="col-md-6">
          {!! Form::label('ing_mensuales','Ingresos Aprox. Mensuales') !!}
    {!! Form::text('ing_mensuales',$referencia->ing_mensuales,['class'=>'form-control tipo','placeholder'=>'Ingresos Mensuales','required']) !!}
     
  </div>
</div>
 
  <div class="row">
   <div class="col-md-6">
    <div class="form-group">
    {!! Form::submit('Actualizar',['class'=>'btn btn-primary','id'=>'btn-add-ref']) !!}

  </div>
  </div>
  
  </div>
{!! Form::close() !!}
</div>
            
       

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
