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
            <h3>Referencias</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          
         <table class="table table-bordered">
              <thead>             
                <th>Nombres</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>E-mail</th>    
                <th>Acciones</th>               
              </thead>
              <tbody>
              @foreach($referencias as $referencia)
                    <tr>
                    <td>
                      {{ $referencia->name }} {{ $referencia->last_name }}
                    </td>
                    <td>
                      {{ $referencia->direccion }}
                    </td>
                    <td>
                      {{ $referencia->telefono }}
                    </td>
                    <td>
                      {{ $referencia->email }}
                    </td>
                    <td>
                     <a href="/admin/referencias/view/{{ $referencia->id }}">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="/admin/referencias/delete/{{ $referencia->id }}" onclick='return confirm("¿Está seguro de eliminar el registro?\nSe eliminaran todos los datos asociados a el.\nCuentas de ahorro, creditos y demas...")'>
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
