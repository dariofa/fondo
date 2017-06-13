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
            <h3 class="box-title">Administración de Tipos de Ingresos </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>


          <div class="box-body">
            <div class="row">
            {!! Form::open(['url' => 'admin/tipos/ingresos/registrar/', 'method' => 'post']) !!}
                   <div class="col-lg-4">                  
                    {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de cuenta','class'=>'form-control','id'=>'name','required']) }}          
                    </div><!-- /.col-lg-6 -->  
                    <div class="col-lg-4">   
                     {{ Form::select('tipo', ['cuenta' => 'Depositos','retiro'=>'Retiros a Cuenta'], null, ['placeholder' => 'Tipo','class'=>'form-control','id'=>'tipo_mov']) }}   
                    </div><!-- /.col-lg-6 -->  
                     <div class="col-lg-4">                  
                        <div class="input-group">
                          {{ Form::select('categoria', ['ahorro' => 'C. Ahorro','credito'=>'Credito','fondo_solidaridad'=>'Fondo Solidaridad','fondo_empresa'=>'Fondo Empresa'], null, ['placeholder' => 'Categoria','class'=>'form-control','id'=>'categorias']) }}
                        
                          <span class="input-group-btn">
                            <button id="" class="btn btn-success" type="submit"><i class="fa fa-cog"></i></button>
                          </span>
                        </div><!-- /input-group -->                    
                    </div><!-- /.col-lg-6 --> 
               {!! Form::close() !!}      
            </div>
<hr>
              <!--Encabezado -->
            <div class="row">
 <div class="col-lg-12">                
          <table class="table table-hover table-striped">
              <thead>             
                <th>Id</th>
                <th>Nombre</th> 
                <th>Tipo</th>     
                <th>Categoria</th>                 
                <th>Acciones</th>               
              </thead>
              <tbody>
              @foreach($tipos_movimientos as $tipos_movimiento)
                    <tr>
                    <td>
                      {{ $tipos_movimiento->id }}
                    </td>
                    <td>
                      {{ $tipos_movimiento->name }}
                    </td>
                    <td>
                      {{ $tipos_movimiento->tipo }}
                    </td>
                    <td>
                      {{ $tipos_movimiento->categoria }}
                    </td>
                    <td>
                  <a href="#">
                            <button onclick="openModalMovi({{ $tipos_movimiento->id }})" type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="/admin/tipos/movimientos/delete/{{ $tipos_movimiento->id }}" onclick='return confirm("¿Está seguro de eliminar el registro?\nSe eliminaran todos los datos asociados a el.\nCuentas de ahorro, creditos y demas...")'>
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
                        {!! Form::open(['url' => 'admin/tipos/movimientos/update', 'method' => 'post']) !!}
        {{ Form::hidden('id',null, ['class'=>'form-control','id'=>'id']) }}
            <div class="row">
              <div class="col-lg-4"> 
                 {{ Form::text('name',null, ['placeholder' => 'Nombre del tipo de cuenta','class'=>'form-control','id'=>'names','required']) }}
              </div>
              <div class="col-lg-4"> 
                 {{ Form::select('tipo', ['cuenta' => 'Depositos','retiro'=>'Retiros a Cuenta'], null, ['placeholder' => 'Tipo','class'=>'form-control','id'=>'tipo']) }}
              </div>                    
            <div class="col-lg-4">                  
                          {{ Form::select('categoria', ['ahorro' => 'C. Ahorro','credito'=>'Credito','fondo_solidaridad'=>'Fondo Solidaridad','fondo_empresa'=>'Fondo Empresa'], null, ['placeholder' => 'Categoria','class'=>'form-control','id'=>'categoria']) }}
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
            

</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
