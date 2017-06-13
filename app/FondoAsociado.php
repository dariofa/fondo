<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FondoAsociado extends Model
{
    protected $table ="fondo_riesgo";

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
