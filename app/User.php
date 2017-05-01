<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\AdminIngreso;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'username',
        'telefono',
        'num_doc',
        'lug_exp_doc',
        'dir_res',
        'type_doc',
        'fecha_nac',
        'lug_nac',
        'est_civil',
        'eps',
        'celular',
        'inf_prof',
        'inf_labo',
        'id'       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ingresos(){
        return $this->hasMany('App\Ingreso');
    }
    
    public function adminIngresos(){

        
        //return $this->hasmany(AdminIngreso::class);
         return $this->hasmany('App\AdminIngreso');
      } 
/* 
   public function adminIngresos(){
        return $this->belongsToMany('App\Ingreso','ingresos_id','user_id');
      }     
*/

    public function scopeSearchUsers($query,$id)
    {
        return $query->where("id", '<>', "$id");
    }
 
}
