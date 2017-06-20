<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenciaTipo extends Model
{
    //

    protected $table = "referencias_tipo";
    protected $fillable = ["name",'id'];

    public function creditos(){
        return $this->belongsToMany('App\Credito','credito_referencias')->withPivot('referencias_id','parentesco');
    }

public function referencias(){
        return $this->belongsToMany('App\Referencia','credito_referencias')->withPivot('credito_id','parentesco');
    }
}
