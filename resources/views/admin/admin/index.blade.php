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
            <h3 class="box-title">Credito:: </h3>
            
         <!-- -->  

           

 
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
<div id="exTab1" class="container"> 
                  <ul  class="nav nav-pills">
                  
                        <li class="active"><a href="#1a" id="buscarInfLabo" data-toggle="tab">Cuentas</a>
                        </li>
              
                        <li>
        <a class="" href="#2a" data-toggle="tab" id="buscarBienes">Creditos</a>
                        </li>
                        <li><a href="#3a" id="buscarInfLabo" data-toggle="tab">Referencias</a>
                        </li>
                        
                                            
                      </ul> 
                  <hr>
                        <div class="tab-content clearfix">
                         
<div class="tab-pane active" id="1a">
    <div class="container">
      <div class="row">
            
            <table class="table table-striped table-responsive">
              <thead>
                <th>No de Cuenta</th>
                <th>Saldo</th>
                <th>Saldo Anterior</th>
                <th>Estado</th>
                <th>Categoria</th>
                <th>Ganancia %</th>
                <th>Aciones</th>
              </thead>
              <?php $num=0; ?>
              <tbody>
                @foreach($cuentas as $cuenta)
                 <tr id="row{{ $num }}">
                  <td>
                    {{ $cuenta->num_cuenta }}
                  </td>
                  <td>
                    {{ $cuenta->saldo }}
                  </td>
                  <td>
                    {{ $cuenta->saldo_anterior }}
                  </td>
                  <td>
                    {{ $cuenta->estado }}
                  </td>
                  <td>
                    {{ $cuenta->categoria }}
                  </td>
                  <td>
                    {{ $cuenta->ganancia }}
                  </td>
                  <td>
                    <a href="/admin/cuentas/edit/{{ $cuenta->id }}" class="btn btn-info">Editar</a>
                  </td>
                </tr>
<?php $num++; ?>
                @endforeach
              </tbody>
            </table>

      </div>
    


    </div><!--fin container -->
                          </div>

                           <div class="tab-pane" id="2a">
<div class="container">
      <div class="row">
            
            <table class="table table-striped table-responsive">
              <thead>
                <th>No de Cuenta</th>
                <th>Valor del Credito</th>
                <th>No Cuotas</th>
                <th>Estado</th>
                <th>Saldo</th>
                <th>Fecha Act %</th>
                <th>Aciones</th>
              </thead>
              <tbody>
                @foreach($creditos as $credito)
                 <tr id="row{{ $num }}">
                  <td>
                    {{ $credito->num_credito }}
                  </td>
                  <td>
                    {{ $credito->valor_credito }}
                  </td>
                  <td>
                    {{ $credito->nu_cuotas }}
                  </td>
                  <td>
                    {{ $credito->estado }}
                  </td>
                  <td>
                    {{ $credito->saldo }}
                  </td>
                  <td>
                    {{ $credito->fecha_act }}
                  </td>
                  <td>
                    <a href="/admin/cuentas/edit/{{ $cuenta->id }}" class="btn btn-info">Editar</a>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>

      </div>
    


    </div><!--fin container -->





                          </div>
<!--Panel 3-->        
<div class="tab-pane"  id="3a">
                
</div>
<!--Fin Panel 3-->  
                           <div class="tab-pane " id="4a">
     
                          </div>




                          </div>

</div>
 
       

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
