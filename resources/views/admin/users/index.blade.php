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
            

            <table class="table table-hover table-striped" id="tabla-users">
              <thead>             
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>    
                <th>Acciones</th>               
              </thead>
              <tbody class="tabla">
              

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
