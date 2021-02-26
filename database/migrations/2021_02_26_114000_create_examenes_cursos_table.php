<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_examen')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_examen')->references('id')->on('examenes');
            $table->foreign('id_curso')->references('id')->on('cursos');
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
        Schema::dropIfExists('examenes_cursos');
    }
}
