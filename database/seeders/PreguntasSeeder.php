<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statement is not correct?'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'Hola que hace'
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 1,
            'puntos' => 3
        ]);
        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 2,
            'puntos' => 3
        ]);
    }
}
