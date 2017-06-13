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
            <h3>Fondos</h3>

            <div class="caja-btn-herr">
              <div class="dropdown">
                      <button onclick="openModalNewFondo()" class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-cog"></i>
                        
                      </button> 
              </div>       
            </div>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">

          <div class="listado_cuentas" id="listado_cuentas">
    <div class="row">
      <div class="col-md-12">
        <h3>Listado de Fondos</h3>
      </div>
    </div>
    <div class="row" align="center">
      <div class="col-md-2">
      <div class="form-group">
         No Fondo
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
          Categoria
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        Saldo Anterior
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
         Saldo
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
         Accion
      </div>
    </div>
    </div>
    
@if(isset($cuentas))
    @foreach($cuentas as $cuenta)
      <!--Esta debe ser la consulta-->
  <div class="row" align="center">

    <div class="col-md-2">
      <div class="form-group">
         {{ $cuenta->num_cuenta  }}
      </div>
    </div>

<div class="col-md-2">
<div class="form-group">
     
         {{ ($cuenta->categoria)  }}
    
      </div>
</div>

  <div class="col-md-2">
      <div class="form-group">
    {{ $cuenta->saldo_anterior  }}
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    {{ $cuenta->saldo  }}
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
   <a href="/admin/fondos/movimientos/view/{{ $cuenta->id }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Ver Movimientos"><i class="fa  fa-retweet"></i>
   </a>

   <a href="{{ url('admin/ingresos/add',$cuenta->num_cuenta) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Realizar Movimientos"><i class="fa   fa-database"></i>
   </a>

    <a href="{{ url('admin/ingresos/add',$cuenta->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa  fa-edit"></i>
   </a>
      </div>
    </div>
  </div><!--Fin-->       

      @endforeach
@endif

    

 </div>

                     
        

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>


  <div class="row">          
                <div class="col-lg-12">
                   <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['url' => 'admin/tipos/cuentas/store', 'method' => 'post']) !!}
              {{ Form::hidden('id',null, ['class'=>'form-control','id'=>'id']) }}
                <div class="row">
                  <div class="col-lg-6">               
                                {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de credito','class'=>'form-control','id'=>'name']) }}
                  </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">                  
                     {{ Form::text('ganancia',null,['placeholder' => 'Ganancia','class'=>'form-control','id'=>'tasa_interes']) }}
                     </div><!-- /.col-lg-6 -->  
                </div>
          <div class="row"><br>
            <div class="col-lg-12">                  
                         {!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}
            </div><!-- /.col-lg-6 --> 
          </div>

                  
{!! Form::close() !!}                    



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
              </div>
                </div>
             

              </div>

@endsection
