@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Home</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
<div class="formulario container">
       
              <!--Encabezado -->
<div class="row">
                   <div class="col-lg-6">
                        <div class="input-group">
                          <input type="text" id="cedula-user" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button id="busc-user" class="btn btn-default" type="button"><i class="fa fa-cog"></i></button>
                          </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->  

</div>
<hr>

<div class="resultadoAjax container" id="resultadoAjax">
          <div class="row">
           <table class="table" id="result-user" style="display: none">
             <thead>
              <th>Cédula</th>
              <th>Nombres</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Diligenciar</th>
             </thead>
             <tbody>
               <tr>
                 <td>
                  <label id="cedula"> </label>
                 </td>
                 <td>
                  <label id="nombres"> </label>
                 </td>
                 <td>
                  <label id="direccion"> </label>
                 </td>
                 <td>
                  <label id="telefono"> </label>
                 </td>
                 <td>
                  <label id="diligenciar"> <button class='btn btn-primary'><i class='fa fa-cog'></i></button> </label>
                 </td>
               </tr>
             </tbody>
           </table>


            <div class="alert alert-info" role="alert" style="display: none" id="alert-not-found">
                       
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
