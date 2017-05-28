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
            <h3>Creditos Pagados</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            <table class="table table-hover table-striped ">
              <thead>
                <th>No Crédito</th>
                <th>Asociado</th>
                <th>Monto Pedido</th>
                <th>Tipo de Crédito</th>
                <th>Tasa de Interes</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($creditos_pagados as $credito_pagado)
                <tr>
                  <td>
                    {{ $credito_pagado->num_credito }}
                  </td>
                  <td>
                    {{ $credito_pagado->user->name }} {{ $credito_pagado->user->last_name }}
                  </td>
                  <td>
                    {{ $credito_pagado->valor_credito }}
                  </td>
                  <td>
                    {{ ($credito_pagado->credito_tipo->name ) }}
                  </td>
                  <td>
                    {{ ($credito_pagado->credito_tipo->tasa_interes ) }}
                  </td>
                  <td>
                    <a href="/admin/fondos/{{ $credito_pagado->id }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Revisar"><i class="fa fa-eye"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
            
        

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
