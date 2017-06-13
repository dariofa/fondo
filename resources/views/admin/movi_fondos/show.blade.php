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
            <h3 class="box-title">Listado de Movimientos </h3>

			<div class="input-group box-busc-cuenta">
                          {{ Form::text('name',null, ['placeholder' => 'Buscar una Cuenta','class'=>'form-control','id'=>'categoria']) }}
                        
                          <span class="input-group-btn">
                            <button id="add-tipo-cuenta" class="btn btn-primary" type="submit"><i class="fa fa-search-plus"></i></button>
                          </span>
             </div>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>

          </div>
          <div class="box-body">         
      				
					<div class="row">
						      <div class="col-md-2">
						      <div class="form-group">
						         No Cuenta
						      </div>
						    </div>
						    <div class="col-md-3">
						      <div class="form-group">
						          Tipo de Movimiento
						      </div>
						    </div>
						    <div class="col-md-2">
						      <div class="form-group">
						        Monto
						      </div>
						    </div>
						    <div class="col-md-2">
						      <div class="form-group">
						         Periodo
						      </div>
						    </div>
						    <div class="col-md-3">
						      <div class="form-group">
						         Acciones
						      </div>
						    </div>
				</div>	<!--Fin row-->


				@foreach($cuenta->ingresos_cuenta as $movimiento)
      <!--Esta debe ser la consulta-->
      
  <div class="row">

    <div class="col-md-2">
      <div class="form-group">
      {{ $movimiento->cuenta->num_cuenta  }}
         
      </div>
    </div>

<div class="col-md-3">
<div class="form-group">
     {{ ($movimiento->ingresos_tipo->name)  }}  
      
     @if($movimiento->ingresos_tipo->categoria == 'credito')
                    @foreach($cuenta->creditos as $credito)
                        <label for="">--{{ $credito->num_credito}}</label>
                    @endforeach                 
              @endif
    
      </div>
</div>

  <div class="col-md-2">
      <div class="form-group">
      @if($movimiento->ingresos_tipo->categoria != $cuenta->categoria and $movimiento->ingresos_tipo->tipo == 'retiro')
		<label for="">-</label>	
      @endif
    {{ $movimiento->valor  }}
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    {{ $movimiento->mes  }}
      </div>
    </div>

    
  </div><!--Fin--> 
        @endforeach
	
			 </div>      
      
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
