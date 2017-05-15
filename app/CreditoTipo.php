<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditoTipo extends Model
{
    protected $table ="creditos_tipo";

    protected $fillable = [
    	'id',
    	'tasa_interes',
    	'name',
    	   	    	
    ];

    public function creditos(){
     	return $this->hasMany('App\Credito');
     }
}
