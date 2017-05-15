<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoCredito extends Model
{
   protected $table ="movimientos_credito";

    protected $fillable = [
    	'fecha',
        'valor',
    	'movimiento_tipo_id',
    	'credito_id',   	

    ];

    public function credito(){
     	return $this->belongsTo('App\Credito','credito_id');
     }
     public function movimiento_tipo(){
     	return $this->belongsTo('App\MovimientoTipo','movimiento_tipo_id');
     }

     public function parrilla($num_cuotas,$valor,$forma_pago){

        $fecha = date('Y-m-d');       
        $listado = array();
        $lis_cuotas = array('valor'=>'','fecha'=>'');
        for ($i=0; $i < $num_cuotas ; $i++) { 
            $mod_date = strtotime($fecha.$forma_pago);
            $fecha = date("Y-m-d",$mod_date);
            $lis_cuotas['valor'] = $valor;
            $lis_cuotas['fecha'] = $fecha;
            $listado = array_prepend($listado, $lis_cuotas);
        }
        $listado = array_reverse($listado);
        return $listado; 
     }
}
