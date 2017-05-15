@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row ingresos-container">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Administración de Tipos de Cuentas </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>


          <div class="box-body">
            <div class="row">
                   
     {!! Form::open(['url' => 'admin/tipos/cuentas/store', 'method' => 'post']) !!}

                    <div class="col-lg-6">                  
                        <div class="input-group">
                          {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de cuenta','class'=>'form-control','id'=>'categoria']) }}
                        
                          <span class="input-group-btn">
                            <button id="add-tipo-cuenta" class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
                          </span>
                        </div><!-- /input-group -->                    
                    </div><!-- /.col-lg-6 -->  
{!! Form::close() !!}
            </div>
<hr>
              <!--Encabezado -->
            <div class="row">
 <div class="col-lg-12">                
          <table class="table table-hover table-striped tabla-tipo-ing" id="tabla-tipos-cuentas">
              <thead>             
                <th>Id</th>
                <th>Nombre</th> 
                          
                <th>Acciones</th>               
              </thead>
              <tbody class="tabla">
              

              </tbody>
            </table>

</div>



            </div><!--Fin row-->
            

</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
