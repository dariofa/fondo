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
            <h3 class="box-title">Usuarios Registrados</h3>
            <a href="{{route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
                
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
              @foreach($users as $user)
                    <tr>
                    <td>
                      {{ $user->name }} {{ $user->last_name }}
                    </td>
                    <td>
                      {{ $user->dir_res }}
                    </td>
                    <td>
                      {{ $user->telefono }}
                    </td>
                    <td>
                      {{ $user->email }}
                    </td>
                    <td>
                     <a href="/admin/users/{{ $user->id }}">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa  fa-eye"></i>
                            </button>
                        </a>
                        <a href="/admin/users/delete/{{ $user->id }}" onclick='return confirm("¿Está seguro de eliminar el registro?\nSe eliminaran todos los datos asociados a el.\nCuentas de ahorro, creditos y demas...")'>
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </td>
                    </tr>

              @endforeach        
      
              </tbody>
            </table>
  {{ $users->render() }}

  
       

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>

@endsection
