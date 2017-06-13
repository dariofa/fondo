@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido::  {{ Auth::user()->name }} </div>

                <div class="panel-body">
                   <p>Antes de iniciar deberas crear las cuentas para manejar los fondos de la empresa</p>
                        {!! Form::open(['url'=>'/admin/cuentas/store/root','method'=>'POST','id'=>'form-new-credito']) !!}
{!! Form::text('user_id', Auth::user()->id,['class'=>'form-control','readonly','required','id'=>'num_cuenta']) !!}
                        <div class="row">       
                              <div class="col-md-4">
                                  <div class="form-group">
                                  {!! Form::label('num_cuenta','No de Cuenta') !!}
                                   {!! Form::text('num_cuenta[]',1,['class'=>'form-control','readonly','required','id'=>'num_cuenta']) !!}
                                 </div> 
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('categoria','Categoria') !!}
                              {!! Form::text('categoria[]','fondo_riesgo',['class'=>'form-control','readonly','required','id'=>'categoria']) !!}             
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('ganancia','Ingresos') !!}
                              {!! Form::text('ganancia[]',1.5,['class'=>'form-control','required','id'=>'categoria']) !!}             
                              </div>
                        </div><!--Fin row-->

                         <div class="row">       
                              <div class="col-md-4">
                                  <div class="form-group">
                                  {!! Form::label('num_cuenta','No de Cuenta') !!}
                                   {!! Form::text('num_cuenta[]',2,['class'=>'form-control','readonly','required','id'=>'num_cuenta']) !!}
                                 </div> 
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('categoria','Categoria') !!}
                              {!! Form::text('categoria[]','fondo_asociados',['class'=>'form-control','readonly','required','id'=>'categoria']) !!}             
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('ganancia','Ingresos') !!}
                              {!! Form::text('ganancia[]',2.5,['class'=>'form-control','required','id'=>'categoria']) !!}             
                              </div>
                        </div><!--Fin row-->

                        <div class="row">       
                              <div class="col-md-4">
                                  <div class="form-group">
                                  {!! Form::label('num_cuenta','No de Cuenta') !!}
                                   {!! Form::text('num_cuenta[]',3,['class'=>'form-control','readonly','required','id'=>'num_cuenta']) !!}
                                 </div> 
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('categoria','Categoria') !!}
                              {!! Form::text('categoria[]','fondo_solidaridad',['class'=>'form-control','readonly','required','id'=>'categoria']) !!}             
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('ganancia','Ingresos') !!}
                              {!! Form::text('ganancia[]',16,['class'=>'form-control','required','id'=>'categoria']) !!}             
                              </div>
                        </div><!--Fin row-->

                         <div class="row">       
                              <div class="col-md-4">
                                  <div class="form-group">
                                  {!! Form::label('num_cuenta','No de Cuenta') !!}
                                   {!! Form::text('num_cuenta[]',4,['class'=>'form-control','readonly','required','id'=>'num_cuenta']) !!}
                                 </div> 
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('categoria','Categoria') !!}
                              {!! Form::text('categoria[]','fondo_empresa',['class'=>'form-control','readonly','required','id'=>'categoria']) !!}             
                              </div>
                               <div class="col-md-4">      
                              {!! Form::label('ganancia','Ingresos') !!}
                              {!! Form::text('ganancia[]',16,['class'=>'form-control','required','id'=>'categoria']) !!}             
                              </div>
                        </div><!--Fin row-->
                         <div class="row">      
                              <div class="col-md-6">
                                <div class="form-group">
                                  {!! Form::submit('Registrar Nuevo Credito',['class'=>'btn btn-success']) !!}      
                                 </div> 
                              </div>
                        </div><!--Fin row-->

           {!! Form::close() !!}
                         

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
