<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->default("No aplica");
            $table->string('username',30)->default("No aplica")->unique();
            $table->string('email',30)->default("No aplica")->unique();
            $table->string('password')->default("No aplica");
            $table->string('dir_res')->default("No aplica");
            $table->string('telefono')->default("No aplica");
            $table->string('type_doc')->default("No aplica");
            $table->string('num_doc',20)->default("No aplica")->unique();
            $table->string('lug_exp_doc')->default("No aplica");
            $table->date('fecha_nac')->default("01-01-0001"); 
            $table->string('lug_nac')->default("No aplica");
            $table->string('est_civil')->default("No aplica");
            $table->string('eps')->default("No aplica");
            $table->string('num_hijos')->default("No aplica");;
            $table->string('est_laboral')->default("No aplica");;
            $table->string('pun_sisben')->default("No aplica");;
            $table->string('celular')->default("No aplica"); 
            $table->enum('tipo_rol',['admin','cliente','root'])->default('cliente');
            $table->enum('bandera',['true','false'])->default('false');;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
