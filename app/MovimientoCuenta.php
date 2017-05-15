<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoCuenta extends Model
{
    protected $table = "movimientos_cuenta";

    protected $fillable = [
    'valor',
    'mes',
    'movimiento_tipo_id',
    'cuenta_id',

    ];

    public function cuenta(){
     	return $this->belongsTo('App\Cuenta','cuenta_id');
     }
     public function ingresos_tipo(){
     	return $this->belongsTo('App\MovimientoTipo','movimiento_tipo_id');
     }
}
