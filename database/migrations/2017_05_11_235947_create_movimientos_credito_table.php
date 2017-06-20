<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_credito', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor');
            $table->string('fecha');
            $table->enum('estado',['pendiente','vencida','pagada'])->default('pendiente');
            
            

            $table->integer('movimiento_tipo_id')->unsigned();
            $table->foreign('movimiento_tipo_id')->references('id')->on('movimientos_tipo')->onDelete('cascade');

            $table->integer('credito_id')->unsigned();
            $table->foreign('credito_id')->references('id')->on('creditos')->onDelete('cascade');
            
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
        Schema::dropIfExists('movimientos_credito');
    }
}
