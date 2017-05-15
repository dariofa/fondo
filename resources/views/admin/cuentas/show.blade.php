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
            @foreach($cuentas as $cuenta)
              <h5>Cuentas para el usuario: {{ $cuenta->user->name }} {{ $cuenta->user->last_name }}   </h5> @break;
            @endforeach

                          
                            
           

        <div class="row">            
            <div class="col-md-3">
              <div class="form-group">
                No Cuenta
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                Saldo Anterior
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                Nuevo Saldo
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                Acción
              </div>
          </div>

        </div>
        <hr>
            @foreach($cuentas as $cuenta )
                <div class="row">
  
         <div class="col-md-3">
              <div class="form-group">
              {{ $cuenta->num_cuenta }}
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                {{ $cuenta->saldo_anterior }}
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                {{ $cuenta->saldo }}
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Realizar Movimientos" href="{{ url('admin/ingresos/add',$cuenta->num_cuenta) }}"><i class="fa fa-cog"></i></a>
              </div>

          </div>


</div>
               

            @endforeach
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
