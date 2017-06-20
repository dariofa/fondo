<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('num_doc',30)->unique();
            $table->string('type_doc',30);
            $table->string('direccion',30);
            $table->string('telefono');
            $table->string('email');
            $table->string('lug_exp_doc');
            $table->string('est_laboral');
            $table->date('fec_nacimiento');
            $table->string('ing_mensuales');
            
            
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencias');
        
    }
}
