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
              <h4>Monto Total a Pagar:: {{ $creditos->saldo }}</h4>
              <h4>Tipo de Credito:: {{ $creditos->credito_tipo->name }}</h4>  
              <h4>Tasa de Interes:: {{ $creditos->credito_tipo->tasa_interes }}%</h4> 
              <h4>Ahorro Generado:: {{ $ahorro }} a Cuenta:: {{ $creditos->cuenta->num_cuenta }}</h4>  
          
            @if($creditos->estado == 'activo')
                <a href="/admin/creditos/change/status/{{ $creditos->id }}/aceptado" class="btn btn-success">Aceptar</a>

                  <a href="/admin/creditos/change/status/{{ $creditos->id }}/rechazado" class="btn btn-danger">Rechazar</a>

                @elseif($creditos->estado == 'aceptado')
                <a href="/admin/creditos/change/status/{{ $creditos->id }}/cancelado" class="btn btn-danger">Cancelar</a>

            @elseif($creditos->estado == 'rechazado')
            <a href="#" class="btn btn-success">Eliminar</a>

            @endif

         <!-- -->  

            <a href="/admin/creditos/change/status/{{ $creditos->id }}/inactivo" class="btn btn-warning">Inactivar</a>

 
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
                  @if($creditos->estado == 'aceptado')
                        <li class="active"><a href="#3a" id="buscarInfLabo" data-toggle="tab">Listado de Coutas</a>
                        </li>
                  @endif
                        <li>
        <a class="<?php if ($creditos->estado != 'aceptado') echo 'active';  ?>" href="#1a" data-toggle="tab" id="buscarBienes">Bienes</a>
                        </li>
                        <li><a href="#2a" id="buscarInfLabo" data-toggle="tab">Referencias</a>
                        </li>
                        
                                            
                      </ul> 
                  <hr>
                        <div class="tab-content clearfix">
                         
<div class="tab-pane <?php if ($creditos->estado != 'aceptado') echo 'active';  ?>" id="1a">
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
    <div class="col-md-4">
      <h5>Nombres:</h5>
    </div>
  <div class="col-md-3">
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
  
  </div>

 @foreach($creditos->referencias as $referencia)
  <div class="row">
     <div class="col-md-4">
      <b> {{ $referencia->name }} </b>
      <b> {{ $referencia->last_name }} </b>
     </div>
     <div class="col-md-3">
      <b> {{ $referencia->direccion }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->telefono }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->pivot->parentesco }} </b>
     </div>
     <div class="col-md-1">
      <b> {{ $referencia->est_laboral }} </b>
     </div>
     <div class="col-md-2">
      <b> {{ ($creditos->referencias_tipo[0]->name) }} </b>
     </div>
      
     
  </div>
 @endforeach 
</div>

<hr>



                          </div>
<!--Panel 3-->        
<div class="tab-pane <?php if ($creditos->estado == 'aceptado') echo 'active'; ?> "  id="3a">
                <?php $num = 0; ?>
      {!! Form::open(['url'=>['admin/ingresos/creditos'],'method'=>'POST','id'=>'form-new-credito']) !!}
      {!! Form::hidden('cuenta_id',$creditos->cuenta->id,['class'=>'form-control','placeholder'=>'000.000','id'=>'cuenta_id'.$num,'required']) !!}
<table class="table">
<tr>
      <td colspan="4">
       {!! Form::submit('Poner en Marcha',['class'=>'btn btn-success']) !!}      
      </td>
    </tr>  
  <tr>
    <td>No</td>
    <td>Valor de la Cuota</td>
    <td>Fecha de Vencimiento</td>
    <td>Tipo Movimiento</td>
   
    <td>Estado</td>
  </tr>
  @foreach($listado as $lista) 
    <tr> 
      <td>
           {{ $num = $num + 1 }}
           {!! Form::hidden('credito_id',$creditos->id,['class'=>'form-control','placeholder'=>'000.000','id'=>'credito_id'.$num,'required']) !!}
      </td>    
      <td>
       <label for="">{{ $lista['valor'] }}</label>
        {!! Form::hidden('valor[]',$lista['valor'],['class'=>'form-control','placeholder'=>'000.000','id'=>'valor'.$num,'required']) !!}
       </td>
      <td>
       <label for="">{{ $lista['fecha'] }}</label>
       {!! Form::hidden('fecha[]',$lista['fecha'],['class'=>'form-control','placeholder'=>'000.000','id'=>'fecha'.$num,'required','hidden']) !!}
      </td>
       <td>
       
       {!! Form::select('movimiento_tipo_id',$tipos_movimiento,null,['class'=>'','id'=>'movimiento_tipo_id'.$num,'required']) !!}
      </td>
      <td>
        
     
        <label for=""> pendiente </label>      
     
       
       </td>     
    </tr>   
  @endforeach
    
</table>
 {!! Form::close() !!}  
                 </div>
<!--Fin Panel 3-->  
                           <div class="tab-pane " id="4a">
     
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
