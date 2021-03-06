<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_tipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique();             
            $table->enum('categoria',['ahorro','fondo_riesgo','fondo_asociados'])->default('ahorro')->unique();
            $table->integer('ganancia')->default(16); 
             
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
        Schema::dropIfExists('cuentas_tipo');
    }
}
