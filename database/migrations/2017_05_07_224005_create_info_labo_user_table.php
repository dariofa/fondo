<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoLaboUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_labo_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion');
            $table->string('cargo'); 
            $table->string('telefono');
            $table->string('sector');
            $table->string('salario');
            $table->string('observaciones'); 
                       
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

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
        Schema::dropIfExists('info_labo_user');
    }
}
