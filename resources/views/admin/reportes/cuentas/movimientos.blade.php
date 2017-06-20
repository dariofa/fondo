<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title> 
    <style>
      .table{
        
        width: 100%;
        text-align: center;
        padding: 5px;

      }
      .table th{
        border-bottom: 1px solid #000000;
        padding: 4px;
      }
      .table tr td{
        border-bottom: 1px solid gray;
        padding: 4px;
      }
      .dataCredito{
        float: right;
      }
      .dataUser{
        float: left;
      }
    </style>   
  </head>
  <body>
  <h3>Movimientos</h3>
  <hr>

  <table class="dataUser">
    <tr>
      <td>
       Fecha:: {{ date('Y-m-d H:i:s') }}
      </td>
    </tr>
    <tr>
      <td>
       Nombres:: {{ $cuenta->user->name }} {{ $cuenta->user->last_name }}
      </td>
      <tr>
        <td>
       Dirección:: {{ $cuenta->user->dir_res }} 
      </td>
      </tr>
      <tr>
        <td>
       Teléfono:: {{ $cuenta->user->telefono }} 
      </td>
      </tr>
      <tr><td>
       E-mail:: {{ $cuenta->user->email }}
      </td></tr>
    </tr>
     
  </table>

  <table class="dataCredito">
    <tr>
      <td>
       Cuenta:: {{ $cuenta->num_cuenta}}
      </td>
    </tr>
    <tr>
      <td>
       Tipo de cuenta:: {{ $cuenta->cuenta_tipo->name}}
      </td>
      <tr>
        <td>
       Saldo Actual:: {{ $cuenta->saldo }} 
      </td>
      </tr>
      
  </table>
    
  
      <?php $num = 0 ?>
      <table class="table">
        <thead>
          <tr>
            
            <th>Valor</th>
            <th>Tipo de Transacción</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cuenta->ingresos_cuenta as $ingreso)
            <tr>
              <td>
              @if($ingreso->ingresos_tipo->tipo == 'retiro' and $ingreso->ingresos_tipo->categoria <> 'credito')
                <label for="">-</label> 
              @endif
                {{ $ingreso->valor }}
              </td>
              <td>
                {{ $ingreso->ingresos_tipo->name }}
                 @if($ingreso->ingresos_tipo->categoria == 'credito')
                    @foreach($cuenta->creditos as $credito)
                        <label for="">{{ $credito->num_credito}}</label>
                    @endforeach                 
              @endif
              </td>
              <td>
                {{ $ingreso->mes }}
              </td>
            </tr>
        @endforeach
        </tbody>
      </table>
  </body>
</html>