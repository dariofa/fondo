<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoTipo extends Model
{
    protected $table = "movimientos_tipo";

    protected $fillable = [
    'name',
    'tipo',
    'categoria'    
    ];

    public function ingresos_cuenta(){
     	return $this->hasMany('App\MovimientoCuenta');
     }
}
