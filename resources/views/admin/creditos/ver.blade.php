@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de Creditos para el Usuario:: {{ $creditos[0]->user->name }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
           <!---->
 <div class="row">
   <div class="col-md-2">
     <h5>Numero de Credito</h5>
   </div>
   <div class="col-md-2">
     <h5>Monto Pedido</h5>
   </div>
    <div class="col-md-2">
     <h5>Monto Total a Pagar</h5>
   </div>
   <div class="col-md-2">
     <h5>Saldo Actual</h5>
   </div>
   <div class="col-md-2">
     <h5>Forma de Pago</h5>
   </div>
    <div class="col-md-1">
     <h5>Estado</h5>
   </div>
   <div class="col-md-1">
     <h5>Acción</h5>
   </div>
 </div>
@foreach($creditos as $credito)
  <div class="row">
   <div class="col-md-2">
     {{ $credito->num_credito }}
   </div>
   <div class="col-md-2">
     {{ $credito->valor_credito }}
   </div>
    <div class="col-md-2">
     {{ $credito->getValTotal($credito) }}
   </div>
   <div class="col-md-2">
     {{ $credito->saldo }}
   </div>
   <div class="col-md-2">
    {{ $credito->forma_pago }}
   </div>
    <div class="col-md-1">
     {{ $credito->estado }}
   </div>
    <div class="col-md-1">
     <a href="/admin/ingresos/creditos/view/{{ $credito->id }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Administrar"><i class="fa fa-cogs"></i>
   </a>
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
