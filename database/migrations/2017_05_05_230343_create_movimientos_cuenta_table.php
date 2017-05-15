<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor');
            $table->date('mes');

            $table->integer('movimiento_tipo_id')->unsigned();
            $table->foreign('movimiento_tipo_id')->references('id')->on('movimientos_tipo')->onDelete('cascade');

             $table->integer('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
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
        Schema::dropIfExists('movimientos_cuenta');
    }
}
