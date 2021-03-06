<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_preguntas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_examen')->unsigned();
            $table->integer('id_pregunta')->unsigned();
            $table->decimal('puntos', 5, 2)->nullable();
            $table->integer('id_preg_padre')->unsigned()->nullable();
            $table->boolean('subordinada')->default(0);
            $table->foreign('id_preg_padre')->references('id')->on('examenes_preguntas');
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
        Schema::dropIfExists('examenes_preguntas');
    }
}
