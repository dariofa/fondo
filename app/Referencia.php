<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = 'referencias';
    protected $fillable = ['name','last_name','num_doc','direccion',
            'telefono',
           'lug_exp_doc',
            'parentesco',
            'edad_hijos',
           'des_hijos',
           'sisben',
           'pun_sisben',
           'tipo_vivienda',
           'deu_bancarias',
           'est_laboral',
           'fec_nacimiento',
           'ing_mensuales',
           'ben_gobierno',
           'nuc_familiar',
           'per_cargo',
           'referencias_tipo_id'
           ];

     public function referencia_tipo(){
     	return $this->belongsTo('App\ReferenciaTipo','referencias_tipo_id');
     }      

}
