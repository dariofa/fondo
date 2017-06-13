<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FondoRiesgo extends Model
{
    protected $table ="fondo_asociados";

    protected $fillable = [
    	'id',
    	'saldo_anterior',
    	'saldo',
    	'credito_id'   	    	
    ];

     public function creditos(){
    	return $this->belongsTo('App\Credito','credito_id');
    }	
}
