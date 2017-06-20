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
            <h3 class="box-title"> Credito:: {{ $creditos->num_credito }}</h3>
            <h4>Titular:: {{ $creditos->user->name }} {{ $creditos->user->last_name }}
             Teléfono {{ $creditos->user->telefono }}
             </h4>
              <h4>Estado del Credito:: {{ $creditos->estado }}</h4>  
              <h4>Monto Total a Pagar:: {{ $creditos->valor_credito + ($creditos->valor_credito *(20/100))  }}</h4>
              <h4>Tipo de Credito:: {{ $creditos->credito_tipo->name }}</h4>  
              <h4>Tasa de Interes:: {{ $creditos->credito_tipo->tasa_interes }}%</h4> 
              <h4>Ahorro Generado:: {{ $ahorro }} a Cuenta:: {{ $creditos->cuenta->num_cuenta }}</h4>  
              <h4>Saldo Actual:: ${{ $creditos->saldo }}</h4>  
          
            @if($creditos->estado == 'inactivo')
                <a href="/admin/creditos/change/status/{{ $creditos->id }}/activo" class="btn btn-success">Activar</a>
                @else
                  <a href="/admin/creditos/change/status/{{ $creditos->id }}/inactivo" class="btn btn-success" onclick="return confirm('Esta seguro de inhabilitar el credito!!')">Inactivar</a>          
            @endif
            
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="box-body">
          <div id="exTab1" class="container"> <!--Pilas-->
                  <ul  class="nav nav-pills">
                        <li class="active">
                          <a  href="#1a" data-toggle="tab" id="buscarBienes">Pagos</a>
                        </li>
                        <li><a href="#2a"  data-toggle="tab">Movimientos</a>
                        </li>
                        <li><a href="#3a"  data-toggle="tab">XXXXXX</a>
                        </li>
                        <li><a href="#4a" id="buscarInfPerf" data-toggle="tab">XXXXXX</a>
                        </li>
                        
                      </ul> 
                  <hr>
                        <div class="tab-content clearfix">
                        
                        <!--////////////////////////////////--> 
                          <div class="tab-pane active" id="1a">
                        <?php $num = 0; ?>

{!! Form::open(['url'=>['admin/ingresos/creditos/update'],'method'=>'put','id'=>'form-new-credito']) !!}
<table class="table">
  <tr>
    <td>
      <a href="{{ url('/admin/reportes/credito',$creditos->id) }}"  target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
    </td>
  </tr>

  <tr>
    <td>No</td>
    <td>Valor de la Cuota</td>
    <td>Fecha de Vencimiento</td>
    <td>Tipo de Pago</td>
    <td>Tipo de Movimiento</td>
    <td>Estado</td>
    <td>Acción</td>
  </tr>
  <tr>
    <td>{!! Form::submit('Pagar',['class'=>'btn btn-success','id'=>'btnPagCou','disabled']) !!}</td>
    <td colspan="5">Total a pagar:: <b>$<label for="" id='totalPag'>000.000</label> </b></td>
  </tr>
  {!! Form::hidden('credito_id',$creditos->id,['class'=>'form-control','placeholder'=>'000.000','id'=>'credito_id'.$num,'required']) !!}
  {!! Form::hidden('cuenta_id',$creditos->cuenta->id,['class'=>'form-control','placeholder'=>'000.000','id'=>'cuenta_id'.$num,'required']) !!}
  @foreach($movimientos as $movimiento) 
 <?php $num = $num + 1 ?>
    <tr id="fila{{ $num }}"> 
      <td>
           
           {!! Form::hidden('id[]',$movimiento->id,['class'=>'form-control','placeholder'=>'000.000','disabled','id'=>'id'.$num,'required']) !!}
           
      </td>    
      <td>
       <label for="valor{{ $num }}">{{ $movimiento->valor }}</label>
        {!! Form::hidden('valor[]',$movimiento->valor,['class'=>'form-control','placeholder'=>'000.000','disabled','id'=>'valor'.$num,'required']) !!}
       </td>
      <td>
       <label for="fecha{{ $num }}">{{ $movimiento->fecha }}</label>
      {!! Form::hidden('fecha[]',$movimiento->fecha,['class'=>'form-control','placeholder'=>'000.000','disabled','id'=>'fecha'.$num,'required']) !!}
      </td>
      <td>
       <label for="">{{ $creditos->forma_pago }}</label> 
      
      </td>

       <td>
       <label for="movimiento_tipo_id{{ $num }}">{{ $movimiento->movimiento_tipo->name }}</label>
       {!! Form::hidden('movimiento_tipo_id',$movimiento->movimiento_tipo_id,['class'=>'form-control','id'=>'movimiento_tipo_id'.$num,'required','disabled']) !!}
      
      </td>
      <td> 
      @if($movimiento->fecha > date('Y-m-d') and $movimiento->estado != 'pagada' )   
        <label class="label label-primary" for=""> {{ $movimiento->estado }} </label> 
        @elseif($movimiento->fecha == date('Y-m-d') )
          <label class="label label-warning" for=""> {{ $movimiento->estado }} (Hoy) </label>
          @elseif($movimiento->estado == 'pagada')
          <label class="label label-success" for=""> {{ $movimiento->estado }} </label>
          @else
          <label class="label label-danger" for=""> Atrasada </label>
       @endif    
      </td> 
      <td> 
      @if($movimiento->estado == 'pendiente')   
        <label class="label label-warning" for="{{ $num }}"> Pagar </label>
        {{ Form::checkbox('name', 'value',false,['class'=>'form-control','class'=>'check-add-payment','id'=>$num]) }}  
        @elseif($movimiento->estado == 'pagada')
          <label class="label label-success" for=""> {{ $movimiento->estado }}</label>
          @elseif($movimiento->estado == 'pendiente' and $movimiento->fecha > date('Y-m-d') )
          <label class="label label-danger" for="{{ $num }}"> Pagar </label>
          {{ Form::checkbox('name', 'value',false,['class'=>'form-control','class'=>'check-add-payment','id'=>$num]) }} 

          @endif    
      </td> 


    </tr>   
  @endforeach
     
</table>
 {!! Form::close() !!}
                          </div>
<!--////////////////////////////////--> 
                          <div class="tab-pane" id="2a">
                            
<div class="container">
  <div class="row">
    <div class="col-md-1">
      <label for="">Periodo::</label>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      {!! Form::label('desde','Desde') !!}
      {!! Form::date('desde',null,['class'=>'form-control tipo','placeholder'=>'No Documento','required','id'=>'desde']) !!}
</div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      {!! Form::label('hasta','Hasta') !!}
      {!! Form::date('hasta',null,['class'=>'form-control tipo','placeholder'=>'No Documento','required','id'=>'hasta']) !!}
    </div>
    </div>
     <div class="col-md-3">
      <div class="form-group">

     {!! Form::submit('Buscar',['class'=>'btn btn-success','placeholder'=>'No Documento','required','id'=>'hasta']) !!}
    </div>
    </div>
  </div>


 

                          </div>
<!--////////////////////////////////--> 
                          </div>
        </div> <!--Fin Pilas-->     

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
