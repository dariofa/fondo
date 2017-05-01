<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenciaTipo extends Model
{
    //

    protected $table = "referencias_tipo";
    protected $fillable = ["name"];

    public function referencia(){
        return $this->hasMany('App\Referencia');
    }

}
