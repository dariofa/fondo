<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table ="cuentas";

    protected $fillable = [
    	'num_cuenta',
    	'saldo',
        'user_id',
        'cuenta_tipo_id'    	
    ]; 

    public function user(){
     	return $this->belongsTo('App\User','user_id');
     }

     public function cuenta_tipo(){
        return $this->belongsTo('App\CuentaTipo','cuenta_tipo_id');
     }

    public function ingresos_cuenta(){
     	return $this->hasMany('App\MovimientoCuenta');
     } 

     public function creditos(){
        return $this->hasMany('App\Credito');
     } 
}
