<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminIngreso extends Model
{
    protected $table = 'admin_ingresos';
    protected $fillable = [
    'user_id',
    'ingresos_id'];


    public function user(){
    	//return $this->belongsTo(App\User::class);
    return $this->belongsTo('App\User','user_id');
    }

    public function ingreso(){

    	return $this->belongsTo('App\Ingreso','ingresos_id');
    }
}
