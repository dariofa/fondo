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
            
       <div class="formulario container">
      <div class="row">
          <table>
          <tr>
              <td>
                <span class="">Fecha del Sistema: </span>
              </td>

              <td>
                <span class=""> {{ Carbon\Carbon::now() }} </span>
              </td>
            <tr>
              <td>
                <span class="">Nombres: </span>
              </td>

              <td>
                <span class=""> {{ $user->name }}</span> <span class=""> {{ $user->last_name }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="">Cédula o Nit: </span>
              </td>

              <td>
                <span class=""> {{ $user->num_doc }}</span>
              </td>
            </tr>
          </table>
      </div>


  {!! Form::open(['route'=>['ingresos.store','user_id'=>$user->id],'method'=>'POST','id'=>'formIngresos']) !!}
        <!--Encabezado -->
          <div class="row">
            <div class="col-xs-4">            
                <h4>Concepto de Pago</h4>
          </div>
          <div class="col-xs-4">            
                <h4>Fecha</h4>
          </div>
          <div class="col-xs-4">            
                <h4>Valor</h4>
          </div>
          </div>
        <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('gast_admin',null,false,['class'=>'clase','id'=>'gast_admin']) !!}
                {!! Form::label('gast_admin','Gastos Administrativos',['for'=>'gast_admin']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_gast_admin',null,['class'=>'form-control','required','disabled','id'=>'mes_gast_admin']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_gast_admin',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_gast_admin']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('ahorro',null,false,['class'=>'clase','id'=>'ahorro']) !!}
                {!! Form::label('ahorro','Ahorro',['for'=>'ahorro']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_ahorro',null,['class'=>'form-control','required','disabled','id'=>'mes_ahorro']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_ahorro',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_ahorro']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('aporte',null,false,['class'=>'clase','id'=>'aporte']) !!}
                {!! Form::label('aporte','Aportes',['for'=>'aportes']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_aporte',null,['class'=>'form-control','required','disabled','id'=>'mes_aporte']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_aporte',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_aporte']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('fondo_solid',null,false,['class'=>'clase','id'=>'fondo_solid']) !!}
                {!! Form::label('fondo_solid','Fondos Solidario',['for'=>'fondo_solid']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_fondo_solid',null,['class'=>'form-control','required','disabled','id'=>'mes_fondo_solid']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_fondo_solid',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_fondo_solid']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('ahorro_adi',null,false,['class'=>'clase','id'=>'ahorro_adi']) !!}
                {!! Form::label('ahorro_adi','Ahorro Adicional',['for'=>'ahorro_adi']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_ahorro_adi',null,['class'=>'form-control','required','disabled','id'=>'mes_ahorro_adi']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_ahorro_adi',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_ahorro_adi']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-4">            
                {!! Form::checkbox('otro',null,false,['class'=>'clase','id'=>'otro']) !!}
                {!! Form::label('otro','Otro',['for'=>'otro']) !!}
          </div>
          <div class="col-xs-4">            
               {!! Form::date('mes_otro',null,['class'=>'form-control','required','disabled','id'=>'mes_otro']) !!} 
          </div>
          <div class="col-xs-4">            
                {!! Form::text('val_otro',null,['class'=>'form-control tipo','placeholder'=>'Valor','required','disabled','id'=>'val_otro']) !!} 
          </div>             
        </div><!-- /.row -->
         <!---->
        <div class="row">
          <div class="col-xs-12">            
                {!! Form::textarea('des_otro',null,['class'=>'form-control tipo','placeholder'=>'Descripción...','disabled','required','rows'=>3,'id'=>'des_otro']) !!} 
          </div>             
        </div><!-- /.row -->
            
<div class="form-group">
<hr>
    {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnRegIng','disabled']) !!}
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
