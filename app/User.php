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
        'num_hijos',
        'pun_sisben',
        'est_laboral',
        'eps',
        'celular',
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
    public function getRol(){
        return $this->tipo_rol;
    }
    public function cuentas(){
        return $this->hasMany('App\Cuenta');
    }
    public function creditos(){
        return $this->hasMany('App\Credito');
    }
    public function bienes(){
        return $this->hasMany('App\Bien');
    }

    public function info_labo_user(){
        return $this->hasMany('App\InfoLaboUser');
    }
     public function info_prof_user(){
        return $this->hasMany('App\InfoProfUser');
    }
    
    public function scopeSearchUsers($query,$id)
    {
        return $query->where("id", '<>', "$id");
    }
 
}
