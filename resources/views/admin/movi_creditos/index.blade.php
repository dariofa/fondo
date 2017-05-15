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
<?php $num = 0; ?>

{!! Form::open(['url'=>['admin/ingresos/creditos'],'method'=>'POST','id'=>'form-new-credito']) !!}
<table class="table">


  <tr>
    <td>No</td>
    <td>Valor de la Cuota</td>
    <td>Fecha de Vencimiento</td>
    <td>Tipo de Pago</td>
    <td>Estado</td>
  </tr>
  @foreach($movimientos as $movimiento) 
    <tr> 
      <td>
           {{ $num = $num + 1 }}
           
      </td>    
      <td>
       <label for="">{{ $movimiento->valor }}</label>
        
       </td>
      <td>
       <label for="">{{ $movimiento->fecha }}</label>
      
      </td>
      <td>
       <label for="">{{ $creditos->forma_pago }}</label>
      
      </td>
      <td> 
      @if($movimiento->fecha > date('Y-m-d'))   
        <label class="label label-primary" for=""> {{ $movimiento->estado }} </label> 
        @elseif($movimiento->fecha == date('Y-m-d'))
          <label class="label label-warning" for=""> {{ $movimiento->estado }} (Hoy) </label>
          @else
          <label class="label label-danger" for=""> Atrasada </label>
       @endif    
      </td>     
    </tr>   
  @endforeach
     
</table>
 {!! Form::close() !!}      

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
