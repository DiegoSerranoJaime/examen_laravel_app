<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_alumnos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_res_ex')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_res_ex')->references('id')->on('respuestas_examenes');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('resultados_alumnos');
    }
}
