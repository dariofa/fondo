<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table ="bienes";

    protected $fillable = [
    	'id',
    	'name',
        'tipo',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }


}
