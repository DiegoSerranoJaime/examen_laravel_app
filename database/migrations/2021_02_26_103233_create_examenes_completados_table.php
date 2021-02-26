<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesCompletadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_completados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_examen')->unsigned();
            $table->integer('id_alumno')->unsigned();
            $table->foreign('id_examen')->references('id')->on('examenes');
            $table->foreign('id_alumno')->references('id')->on('users');
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
        Schema::dropIfExists('examenes_completados');
    }
}
