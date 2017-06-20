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
           'type_doc',
           'pun_sisben',
           'email',
           'tipo_vivienda',
           'deu_bancarias',
           'est_laboral',
           'fec_nacimiento',
           'ing_mensuales',
           'ben_gobierno',
           'per_cargo',
           'id'
           
           ];

    /* public function referencia_tipo(){
     	return $this->belongsTo('App\ReferenciaTipo','referencias_tipo_id');
     } */ 

     public function credito(){
        return $this->belongsToMany('App\Credito','credito_referencias')->withPivot('referencia_tipo_id','parentesco');
    }  

    public function referencias_tipo(){
        return $this->belongsToMany('App\ReferenciaTipo','credito_referencias')->withPivot('credito_id','parentesco');
    }   

}
