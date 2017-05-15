<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
   protected $table ="creditos";

    protected $fillable = [
    	'valor_credito',
        'num_credito',
    	'nu_cuotas',
    	'estado',
    	'saldo',
    	'credito_tipo_id',
    	'user_id',
    	'cuenta_id',
        'forma_pago' 

    ];

    public function user(){
      return $this->belongsTo('App\User','user_id');
     }
  public function credito_tipo(){
        return $this->belongsTo('App\CreditoTipo','credito_tipo_id');
     }
     public function cuenta(){
        return $this->belongsTo('App\Cuenta','cuenta_id');
     }

      public function referencias(){
        return $this->belongsToMany('App\Referencia','credito_referencias','credito_id');
    }

    public function movimientos(){
        return $this->hasMany('App\MovimientoCredito');
    }


}
