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
       Nombres:: {{ $creditos->user->name }} {{ $creditos->user->last_name }}
      </td>
      <tr>
        <td>
       Dirección:: {{ $creditos->user->dir_res }} 
      </td>
      </tr>
      <tr>
        <td>
       Teléfono:: {{ $creditos->user->telefono }} 
      </td>
      </tr>
      <tr><td>
       E-mail:: {{ $creditos->user->email }}
      </td></tr>
    </tr>
     
  </table>

  <table class="dataCredito">
    <tr>
      <td>
       Credito:: {{ $creditos->num_credito }}
      </td>
    </tr>
    <tr>
      <td>
       Valor:: {{ $creditos->getValTotal($creditos) }}
      </td>
      <tr>
        <td>
       Saldo Actual:: {{ $creditos->saldo }} 
      </td>
      </tr>
      <tr>
        <td>
       Fecha de Activación:: {{ $creditos->fecha_act }} 
      </td>
      </tr>
      <tr><td>
       Tipo de Credito:: {{ $creditos->credito_tipo->name }} 
      </td></tr>
    </tr>
     <tr>
      <td>
       Estado:: {{ $creditos->estado }}
      </td>
    </tr>
  </table>
    
  
      <?php $num = 0 ?>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Valor de la Couta</th>
            <th>Tipo de Pago</th>
            <th>Fecha de Vencimiento</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>

          @foreach($creditos->movimientos as $movimiento)
          <?php $num = $num + 1 ?>
      <tr>
        <td>
          {{ $num }}
        </td>
        <td>
          {{ $movimiento->valor}}
        </td>
        <td>
          {{ $creditos->forma_pago  }}
        </td>
        <td>
          {{ $movimiento->fecha }}
        </td>
        <td>
          {{ $movimiento->estado }}
        </td>
      </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>