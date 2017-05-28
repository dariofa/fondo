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
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Home</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div> 
          <div class="box-body">
            
            <div class="formulario">
  {!! Form::open(['route'=>'users.store','method'=>'POST','id'=>'formNewUer']) !!}
    {!! Form::hidden('username',null,['class'=>'form-control tipo','placeholder'=>'No Documento','id'=>'username']) !!}
    {!! Form::hidden('password',null,['class'=>'form-control tipo','placeholder'=>'No Documento','id'=>'password']) !!}  
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
      {!! Form::text('num_doc',null,['class'=>'form-control tipo','placeholder'=>'No Documento','required','id'=>'num_doc']) !!}           
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

            

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
