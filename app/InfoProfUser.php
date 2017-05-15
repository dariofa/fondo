<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoProfUser extends Model
{
    protected $table="info_prof_user";

   protected $fillable=[
   	'nivel',
   	'titulo',
   	'fecha',
   	'observaciones',
   	'user_id'
   ];

   public function user(){
     	return $this->belongsTo('App\User','user_id');
     }
}
