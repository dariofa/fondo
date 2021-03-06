<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_cuenta',30)->unique();
            $table->integer('saldo');
            $table->enum('estado',['activa','inactiva'])->default('activa');
            $table->enum('categoria',['ahorro','fondo_riesgo','fondo_asociados','fondo_empresa','fondo_solidaridad'])->default('ahorro');
            $table->double('ganancia')->default(16);
                      
            $table->integer('saldo_anterior');
            

           // $table->integer('cuenta_tipo_id')->unsigned();
          //  $table->foreign('cuenta_tipo_id')->references('id')->on('cuentas_tipo')->onDelete('cascade'); 

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
        Schema::dropIfExists('cuentas');
    }
}
