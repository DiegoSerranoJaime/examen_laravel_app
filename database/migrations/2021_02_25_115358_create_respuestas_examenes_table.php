<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_examenes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ep')->unsigned();
            $table->integer('id_respuesta')->unsigned();
            $table->boolean('correcta');
            $table->foreign('id_ep')->references('id')->on('examenes_preguntas');
            $table->foreign('id_respuesta')->references('id')->on('respuestas');
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
        Schema::dropIfExists('respuestas_examenes');
    }
}
