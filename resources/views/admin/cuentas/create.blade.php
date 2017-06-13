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
             <div class="container-new-cuenta" id="container-new-cuenta">               
                <div class="row">
                <div class="col-md-12">
                    <h4>Datos de la Nueva cuenta</h4>    
                </div>
                </div>     

                      <div class="row">
          {{ Form::hidden('user_id',$user->id,['id' => 'user_id']) }}
              <div class="col-md-4">
                         <div class="form-group">
          {!! Form::label('num_cuenta','Numero de la Cuenta') !!}
          {!! Form::text('num_cuenta',time(),['class'=>'form-control','required','readonly','id'=>'num_cuenta']) !!} 
                         </div>
               </div>
  

                <div class="col-md-4">
                         <div class="form-group">
          {!! Form::label('categoria','Tipo de Cuenta') !!}
          <select id="categoria" class="form-control" placeholder="Tipo de Cuenta">
            
                 <option value="ahorro">Ahorros</option> 
            
          </select>
          

                         </div>
                  </div>
                <div class="col-md-4">
                         <div class="form-group">
          {!! Form::label('fecha_sis','Fecha del Sistema') !!}
          {!! Form::text('fecha_sis',Carbon\Carbon::now(),['class'=>'form-control','required','disabled']) !!} 
                         </div>
                  </div>

                  </div>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" id="cargo">
                          <h4>Datos Personales del nuevo asociado</h4>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group" id="cargo">
                          <b>No Documento: </b>{{ $user->num_doc }} <b>Tipo Documento: </b>{{ $user->type_doc }}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" id="cargo">
                          <b>Nombres: </b>{{ $user->name }} {{ $user->last_name }}
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" id="cargo">
                          <b>E-mail: </b>{{ $user->email }} <b>Teléfono: </b>{{ $user->telefono }}
                    </div>
                  </div>

             </div> 
             <div class="row">
                <div class="col-md-12">
                  <div class="form-group" id="cargo">                          
    {!! Form::button('Registrar',['class'=>'btn btn-success','id'=>'add-new-cuenta']) !!}
                         </div>
                  </div>
              </div>
              </div>

              <div class="container-ingresos" id="container-ingresos" style="display: none;">
               
<div class="row">
  <div class="col-md-7">
      <div class="form-group">
  Seleccione el tipo de movimiento para la cuenta: <b>{{ $num_cuenta }}</b>
      </div>
    </div> 

  <div class="col-md-5">
      
      Pagos
    {!! Form::radio('movimiento','administracion',false,['class'=>'radio','id'=>'administracion']) !!}     
      <label for="">Ingresos</label>
    {!! Form::radio('movimiento','cuenta',false,['class'=>'radio','id'=>'cuenta']) !!}
    
     
    </div>

</div>

  <div class="row">

    <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Tipo de Ingreso</label>
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Fecha-Mes</label>
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group" id="cargo">
      <label for="">Valor</label>
      </div>
  </div>
 </div>

{!! Form::open(['route'=>['cuentas.store'],'method'=>'POST','id'=>'formB']) !!}

{!! Form::hidden('ingreso_tipo',null,['class'=>'form-control','placeholder'=>'Valor','required','id'=>'ingreso_tipo']) !!}

{!! Form::hidden('cuenta_id',null,['class'=>'form-control','placeholder'=>'Valor','required','id'=>'cuenta_id']) !!}

  
  <div id="resultado-tipo">


  </div>  
  <input type="submit" class="btn btn-success" disabled id="btnNewMov">

{!! Form::close() !!} 


</div>



         

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
