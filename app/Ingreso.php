<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';
    protected $fillable = [
    'mes_gast_admin','val_gast_admin',
    'mes_ahorro','val_ahorro',
    'mes_aporte','val_aporte',

    'mes_fondo_solid','val_fondo_solid',
           'mes_ahorro_adi',       'val_ahorro_adi',
           'mes_otro',
           'val_otro',
           'des_otro',
           'user_id'
      ];


      public function user(){
      	return $this->belongsTo('App\User','user_id');
      }

      public function adminIngreso(){
        return $this->belongsTo('App\AdminIngreso','ingresos_id','id');
      }

/*      public function adminIngresos(){
        return $this->belongsToMany('App\User','users','ingresos_id');
      }

*/



}
