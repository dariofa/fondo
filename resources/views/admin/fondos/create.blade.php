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
            <h3>Asignación de Fondos</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body"> 
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

            <!--Comienzo row-->  
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover table-striped ">
                      <thead>
                        <th>No Crédito</th>
                        <th>Asociado</th>
                        <th>Monto Pedido</th>
                        <th>Monto Pagado</th>
                        <th>Tipo de Crédito</th>
                        <th>Tasa de Interes</th>                
                      </thead>
                      <tbody>               
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
                            {{ ($credito_pagado->valor_credito) + ($credito_pagado->valor_credito * (20/100)) }}
                          </td> 
                           <td>
                            {{ ($credito_pagado->credito_tipo->name)  }}
                          </td>  
                           <td>
                            {{ ($credito_pagado->credito_tipo->tasa_interes) }} %
                          </td>                  
                        </tr>               
                      </tbody>
                  </table>
                </div>
              </div>          
  <!--Fin row-->
        </div>

        <div class="row">
          <div class="col-md-6">
            <h4>Dividendos Obtenidos</h4>
            <table class="table-dividendos">
              <tr>
                <td>
                   Intereses Totales
                </td>
                <td>
                   {{ ($credito_pagado->valor_credito)* (20/100) }}
              </tr>
               <tr>
                <td>
                  Intereses para la Cooperativa 
                </td>
                <td>
                   {{ ((($credito_pagado->valor_credito) * (20/100)) * (20/100)) }}
              </tr>
               <tr>
                <td>
                   Fondo Riesgo
                </td>
                <td>
                   {{ ((($credito_pagado->valor_credito) * (20/100)) * (20/100)) * (37.5/100) }}
              </tr>
               <tr>
                <td>
                   Fondo Intereses (Dividendos Anuales)
                </td>
                <td>
                    {{ ((($credito_pagado->valor_credito) * (20/100)) * (20/100)) - ((($credito_pagado->valor_credito) * (20/100)) * (20/100)) * (37.5/100) }}
              </tr>
              <tr>
                <td>
                  <input type="submit" name="" value="Asignar">
                </td>
              </tr>
            </table>



          </div>



        </div>



          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
