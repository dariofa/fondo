<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_credito',20)->unique();
            $table->string('valor_credito');
            $table->string('nu_cuotas');
            $table->enum('estado',['activo','operando','inactivo','cancelado','rechazado','aceptado'])->default('inactivo');
            $table->string('saldo');
            $table->date('fecha_act');
            
            $table->string('forma_pago');
            
            $table->integer('credito_tipo_id')->unsigned();
            $table->foreign('credito_tipo_id')->references('id')->on('creditos_tipo')->onDelete('cascade'); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            
            $table->timestamps();
        });


        Schema::create('credito_referencias', function (Blueprint $table) {
            $table->increments('id');
          

            $table->integer('credito_id')->unsigned();
            $table->integer('referencia_id')->unsigned();
            
            $table->foreign('credito_id')->references('id')->on('creditos')->onDelete('cascade');

            $table->foreign('referencia_id')->references('id')->on('referencias')->onDelete('cascade');

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
        Schema::dropIfExists('credito');
    }
}
