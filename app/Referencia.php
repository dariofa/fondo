<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = 'referencias';
    protected $fillable = ['name','last_name','num_doc','direccion',
            'telefono',
           'lug_exp_doc',            
           'eps',
           'pun_sisben',
           'parentesco',
           'email',
           'tipo_vivienda',
           'deu_bancarias',
           'est_laboral',
           'fec_nacimiento',
           'ing_mensuales',
           'ben_gobierno',
           'per_cargo',
           'referencias_tipo_id'
           ];

     public function referencia_tipo(){
     	return $this->belongsTo('App\ReferenciaTipo','referencias_tipo_id');
     }  

     public function creditos(){
        return $this->belongsToMany('App\Credito','credito_referencias','referencia_id');
    }    

}
