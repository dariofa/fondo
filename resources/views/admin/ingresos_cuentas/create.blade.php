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
            <h3 class="box-title">Movimientos</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">         
      		<div class="container-ingresos" id="container-ingresos">
               
<div class="row">
	<div class="col-md-5">
      <div class="form-group">
  Seleccione el tipo de movimiento para la cuenta: <b>{{ $cuenta->num_cuenta }}</b>
      </div>
    </div> 

<div class="col-md-6">
      <ul class="menu-radio">
      
       <li>
  <label for="cuenta" id="ingresosLabel"> Ingresos</label> {!! Form::radio('movimiento','cuenta',false,['class'=>'radio','id'=>'cuenta','style'=>"display:none"]) !!}

       </li>
       <li>
 <label for="retiro" id="retirosLabel">Pagos - Retiros</label>{!! Form::radio('movimiento','retiro',false,['class'=>'radio','id'=>'retiro','style'=>"display:none"]) !!}
       </li>
      </ul>
</div>

</div>
<div class="row">
 <!-- <div class="col-md-6">
    <ul class="menu-radio">
        <li>
<label for="efectivo"> Efectivo</label>{!! Form::radio('tipo_pago','efectivo',false,['class'=>'tipo_pago','id'=>'efectivo','style'=>"display:block"]) !!}
       </li>
       <li>
  <label for="ahorro"> Cuenta</label> {!! Form::radio('tipo_pago','ahorro',false,['class'=>'tipo_pago','id'=>'ahorro','style'=>"display:block"]) !!}

       </li>
       
      </ul>
  </div>-->
</div>
  <div class="row">
     <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Tipo de Ingreso</label>
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Fecha-Mes</label>
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Valor</label>
      </div>
  </div>
 </div>

{!! Form::open(['route'=>['cuentas.store'],'method'=>'POST','id'=>'formB']) !!}

<!--<input class='form-control' type="month" name="mep" placeholder="" id="mep">-->
  

{!! Form::hidden('cuenta_id',$cuenta->id,['class'=>'form-control','placeholder'=>'Valor','required','id'=>'cuenta_id','hidden']) !!}

{!! Form::text('ingreso_tipo',null,['class'=>'form-control','placeholder'=>'Valor','required','id'=>'ingreso_tipo','hidden']) !!}



    
  <div id="resultado-tipo">

      
  
  </div>  
  <input type="submit" class="btn btn-success" disabled id="btnNewMov">

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
