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
                          {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de cuenta','class'=>'form-control','id'=>'categoria','required']) }}
                        
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
 <div class="col-lg-12" >                
          <table class="table table-hover table-striped tabla-tipo-ing">
              <thead>             
                <th>Id</th>
                <th>Nombre</th> 
                          
                <th>Acciones</th>               
              </thead>
              <tbody >
              @foreach($tipo_cuentas as $tipo_cuenta)
                <tr>
                  <td>
                    {{ $tipo_cuenta->id }}
                  </td>
                   <td>
                    {{ $tipo_cuenta->name }}
                  </td>
                  <td>
                    <a href="#">
                            <button onclick="openModal({{ $tipo_cuenta->id }})" type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="/admin/tipos/cuentas/delete/{{ $tipo_cuenta->id }}" onclick='return confirm("¿Está seguro de eliminar el registro?")'>
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>

</div>



            </div><!--Fin row-->

            <div class="row">
          
                
              <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                        {!! Form::open(['url' => 'admin/tipos/cuentas/update', 'method' => 'post']) !!}
        {{ Form::hidden('id',null, ['class'=>'form-control','id'=>'id']) }}
                    <div class="col-lg-6">                  
                        <div class="input-group">
                          {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de cuenta','class'=>'form-control','id'=>'cate','required']) }}
                        
                          <span class="input-group-btn">
                            <button id="" class="btn btn-warning" type="submit">Actualizar</button>
                          </span>
                        </div><!-- /input-group -->                    
                    </div><!-- /.col-lg-6 -->  
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
            

</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
