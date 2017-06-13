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
            <h3 class="box-title">Home</h3>    

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
    {!! Form::open(['url'=>['admin/cuentas/update',$cuenta->id],'method'=>'POST']) !!}
  {!! Form::hidden('user_id',$cuenta->user->id,['class'=>'form-control tipo','required']) !!}
            <div class="row">
              <div class="col-md-4">
                 <div class="form-group">
    {!! Form::label('num_cuenta','No Cuenta') !!}
    {!! Form::text('num_cuenta',$cuenta->num_cuenta,['class'=>'form-control tipo','required']) !!}
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group">
    {!! Form::label('estado','Estado') !!}
    {!! Form::select('estado',[""=>"","activa"=>"Activada",'inactiva'=>'Inactiva'],$cuenta->estado,['class'=>'form-control tipo','required']) !!}
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group">
    {!! Form::label('categoria','Categoria') !!}
    {!! Form::select('categoria', ['ahorro' => 'C. Ahorro','credito'=>'Credito','fondo_solidaridad'=>'Fondo Solidaridad','fondo_empresa'=>'Fondo Empresa'],$cuenta->categoria, ['placeholder' => 'Categoria','class'=>'form-control','id'=>'categoria']) !!}
                 </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                 <div class="form-group">
    {!! Form::label('saldo','Saldo') !!}
    {!! Form::text('saldo',$cuenta->saldo,['class'=>'form-control tipo','required']) !!}
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group">
    {!! Form::label('ganancia','Ganancia') !!}
    {!! Form::text('ganancia',$cuenta->ganancia,['class'=>'form-control tipo','required']) !!}
                 </div>
              </div>
              <div class="col-md-4">
                 
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                 {!! Form::submit('Actualizar',['class'=>'btn btn-warning']) !!}
              </div>
            </div>        

{!! Form::close() !!}
  
         

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
