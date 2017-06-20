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
      				
				<div class="listado_cuentas">
						    <diw class="row">
						    @if(isset($Mcuenta))
						    	<div class="col-md-12">
						    		<h3>Listado de Movimientos para la cuenta::
 					    	</div>
						    	@else
						    	<div class="col-md-12">
						    		<h3>Listado de Movimientos para todas las cuentas</h3>
						    	</div>

						    @endif	
						    </diw>
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
						    </div>

						    

		@if(isset($cuentas))
		
			 @foreach($cuentas as $cuenta)

			  
						      <!--Esta debe ser la consulta-->
						  <div class="row">

						    <div class="col-md-2">
						      <div class="form-group">
						         {{ $cuenta->cuenta->num_cuenta  }}
						      </div>
						    </div>

						<div class="col-md-3">
						<div class="form-group">
						
							{{ ($cuenta->ingresos_tipo->name)  }}
						
						         
						      </div>
						</div>

						  <div class="col-md-2">
						      <div class="form-group">
						      
						    {{ $cuenta->valor  }}
						      </div>
						    </div>
						    <div class="col-md-2">
						      <div class="form-group">
						    {{ $cuenta->mes  }}

						      </div>
						    </div>

						    <div class="col-md-3">
						    	<div class="form-group">
   <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa  fa-edit"></i>
   </a>

        					</div>
						    </div>
						  </div><!--Fin--> 




					      @endforeach

						    
						     
		@endif
						    
						   


@if(isset($Mcuenta) )

        <div>

     @foreach($Mcuenta->ingresos_cuenta as $movimiento)
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
                    @foreach($Mcuenta->creditos as $credito)
                        <label for="">--{{ $credito->num_credito}}</label>
                    @endforeach                 
              @endif
    
      </div>
</div>

  <div class="col-md-2">
      <div class="form-group">
      @if($movimiento->ingresos_tipo->tipo == 'retiro' and $movimiento->ingresos_tipo->categoria <> 'credito')
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
 <!---->
 <div>
 	<a href="/admin/reportes/cuenta/movimientos/{{ $Mcuenta->id }}"  target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
 </div>
 @endif

						 </div>      
      
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
