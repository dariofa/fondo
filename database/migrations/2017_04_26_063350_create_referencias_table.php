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
            $table->string('num_doc');
            $table->string('direccion',30)->unique();
            $table->string('telefono');
            $table->string('lug_exp_doc');
            $table->string('parentesco');
            $table->string('edad_hijos');
            $table->string('des_hijos');
            $table->string('sisben');
            $table->string('pun_sisben'); 
            $table->string('tipo_vivienda');
            $table->string('deu_bancarias');
            $table->string('est_laboral');
            $table->date('fec_nacimiento');
            $table->string('ing_mensuales');
            $table->string('ben_gobierno'); 
            $table->string('nuc_familiar');
            $table->string('per_cargo');
            $table->integer('referencias_tipo_id')->unsigned();

            $table->foreign('referencias_tipo_id')->references('id')->on('referencias_tipo')->onDelete('cascade'); 
            $table->timestamps();
        });

        Schema::create('users_referencias',function( Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('referencias_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('referencias_id')->references('id')->on('referencias')->onDelete('cascade');
            


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
        Schema::dropIfExists('users_refencias');
    }
}
