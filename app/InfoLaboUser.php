<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLaboUser extends Model
{
   protected $table="info_labo_user";

   protected $fillable=[
   	'direccion',
   	'cargo',
   	'telefono',
   	'sector',
   	'observaciones',
   	'user_id'
   ];

   public function user(){
     	return $this->belongsTo('App\User','user_id');
     }
}
