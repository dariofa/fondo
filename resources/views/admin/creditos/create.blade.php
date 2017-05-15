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
            <h3 class="box-title">Nuevo Credito</h3>    
            <p>Nombre: <b> {{ $user->name }} {{ $user->last_name }}</b> ||
             Tipo de Documento: <b> {{ $user->type_doc }}</b> ||
             No Documento <b>{{ $user->num_doc }} </b> </p>

             <p>Direccion: <b> {{ $user->dir_res }} {{ $user->last_name }}</b> ||
             Teléfono:<b> {{ $user->telefono }}</b> ||
             E-mail <b> {{ $user->email }} </b> </p>
      
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
              
<div class="container">


  

{!! Form::open(['route'=>['creditos.store','user_id'=>$user->id],'method'=>'POST','id'=>'form-new-credito']) !!}
    <div class="row">       
      <div class="col-md-6">
          <div class="form-group">
          {!! Form::label('cuenta_id','No de Cuenta para el crédito') !!}
            <select class="form-control" name="cuenta_id" required >
              @foreach($cuentas as $cuenta)         
                 <option value="{{ $cuenta->id }}">{{ $cuenta->num_cuenta }}</option>
              @endforeach  
       </select>  
         </div> 
      </div>
       <div class="col-md-6">      
      {!! Form::label('num_credito','Número del Crédito') !!}
      {!! Form::text('num_credito',$num_credito,['class'=>'form-control','readonly','required','id'=>'num_credito']) !!}             
      </div>
    </div><!--Fin row-->

     <div class="row">      
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('name','Tipo de crédito') !!}
            <select class="form-control" name="credito_tipo_id" required id="searchTasa">   
            <option value="">Seleccione...</option>         
                  
                  @foreach($tipo_credito as $tipo)          
                  <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>         
                     @endforeach       
            </select> 
         </div> 
      </div>
      <div class="col-md-6">      
          <div class="form-group">
            {!! Form::label('valor_credito','Valor del Crédito') !!}
            {!! Form::text('valor_credito',null,['class'=>'form-control','placeholder'=>'Valor mínimo 500.000','required','id'=>'valor_credito']) !!}
          </div>       
      </div>

    </div><!--Fin row-->
     <div class="row">      
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('nu_cuotas','Número de Cuotas') !!}
            {!! Form::text('nu_cuotas',null,['class'=>'form-control','required','placeholder'=>'Valor mínimo 1','required','id'=>'num_cuotas']) !!}
            
         </div> 
      </div>
      <div class="col-md-6">      
          <div class="form-group">
            {!! Form::label('saldo','Nuevo Saldo') !!}
            {!! Form::text('saldo',null,['class'=>'form-control','id'=>'saldo_credito','placeholder'=>'000.000','readonly','required']) !!}
          </div>       
      </div>

    </div><!--Fin row-->

    <div class="row">      
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('valor_cuota_mensual','Valor Cuota mensual') !!}
            {!! Form::number('valor_cuota_mensual',null,['class'=>'form-control','placeholder'=>'000.000','readonly','id'=>'valor_cuota_mensual','required']) !!}          
         </div> 
      </div>
      <div class="col-md-3">
        <div class="form-group">
          {!! Form::label('forma_pago','Forma de Pago') !!}
            {!! Form::select('forma_pago',['mensual'=>'Mensual','quincenal'=>'Quincenal','semanal'=>'Semanal','diario'=>'Diario'],null,['class'=>'form-control','placeholder'=>'Seleccione...','id'=>'forma_pago','required']) !!}          
         </div> 
      </div>
       <div class="col-md-3">
        <div class="form-group">
          {!! Form::label('tasa_interes','Tasa de Interes (%)') !!}
            {!! Form::number('tasa_interes',null,['class'=>'form-control','placeholder'=>'0','disabled','id'=>'tasa_interes','required']) !!}          
         </div> 
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
     </div><!--Fin container-->
     

    <div id="resultado-cuentas">
      
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
