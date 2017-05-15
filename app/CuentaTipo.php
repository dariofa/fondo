<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaTipo extends Model
{
    protected $table ="cuentas_tipo";

    protected $fillable = [
    	'id',
    	'name'    	    	
    ];

    public function cuentas(){
     	return $this->hasMany('App\Cuenta');
     }

}
