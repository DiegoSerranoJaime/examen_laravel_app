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
        // Pregunta 1
        DB::table('preguntas')->insert([
            'nombre' => 'Match each characteristic to the correct group.'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'They need to keep their skin wet. they undergo metamorphosis.'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'They lay eggs. the are warm-blooded animals.'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'They are cold-blooded. Their body is covered in scales.They lay eggs on land.'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'They breathe through gills. Their bodies are covered in scales'
        ]);

        DB::table('preguntas')->insert([
            'nombre' => 'They give birth to live offspring. They breathe through lungs.'
        ]);

        // Pregunta 2
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statement is not correct?'
        ]);

        // Pregunta 3
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about vertebrates is not correct?'
        ]);

        // Pregunta 4
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about fish is not correct:'
        ]);

        // Pregunta 5
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about amphibians is not correct:'
        ]);

        // Pregunta 6
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about reptiles is not correct:'
        ]);

        // Pregunta 7
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about birds is not correct:'
        ]);

        // Pregunta 8
        DB::table('preguntas')->insert([
            'nombre' => 'Which of the following statements about mammals is not correct:'
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 1,
            'subordinada' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 2,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 3,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 4,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 5,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 6,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 7,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 8,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 9,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 10,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 11,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 12,
            'puntos' => 3
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 1,
            'id_pregunta' => 13,
            'puntos' => 3
        ]);



        //
        DB::table('examenes_preguntas')->insert([
            'id_examen' => 2,
            'id_pregunta' => 1,
            'subordinada' => 1
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 2,
            'id_pregunta' => 2,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 14
        ]);

        DB::table('examenes_preguntas')->insert([
            'id_examen' => 2,
            'id_pregunta' => 3,
            'subordinada' => 0,
            'puntos' => 2,
            'id_preg_padre' => 14
        ]);

    }
}
