<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pregunta 1
        DB::table('respuestas')->insert([
            'nombre' => 'FISH'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'AMPHIBIANS'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'REPTILES'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'BIRDS'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'MAMMALS'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 2,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 3,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 3,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 3,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 3,
            'id_respuesta' => 4,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 3,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 4,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 4,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 4,
            'id_respuesta' => 3,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 4,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 4,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 5,
            'id_respuesta' => 1,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 5,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 5,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 5,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 5,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 6,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 6,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 6,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 6,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 6,
            'id_respuesta' => 5,
            'correcta' => 1
        ]);

        // Pregunta 2
        DB::table('respuestas')->insert([
            'nombre' => 'Fish: shark, salmon, tuna, dolphin'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Amphibians: forg, newt, salamander, toad'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Mammals: bat, tiger, human, elephant.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Reptiles: snake, turtle, lizard, crocodile'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 7,
            'id_respuesta' => 6,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 7,
            'id_respuesta' => 7
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 7,
            'id_respuesta' => 8
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 7,
            'id_respuesta' => 9
        ]);

        //Pregunta 3
        DB::table('respuestas')->insert([
            'nombre' => 'They all have an internal skeleton that includes a backbone.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Their bodies have three main parts: a head, a trunk and a tail.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They have bilateral symmetry'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'All the statements above are right'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 8,
            'id_respuesta' => 10
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 8,
            'id_respuesta' => 11
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 8,
            'id_respuesta' => 12
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 8,
            'id_respuesta' => 13,
            'correcta' => 1
        ]);

        //Pregunta 4
        DB::table('respuestas')->insert([
            'nombre' => 'Their bodies are covered in scales for protection'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They have a powerful tail and fins which help them to swim'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They are warm-blooded animals'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Their skeleton is made of bones or cartilage'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 9,
            'id_respuesta' => 14
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 9,
            'id_respuesta' => 15
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 9,
            'id_respuesta' => 16,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 9,
            'id_respuesta' => 17
        ]);

        //Pregunta 5
        DB::table('respuestas')->insert([
            'nombre' => 'Tadpoles breathe through gills and adults breathe through lungs'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They are cold-blooded animals'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They only live in terrestrial ecosystems'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Their offspring undergo metamorphosis to become adults'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 10,
            'id_respuesta' => 18
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 10,
            'id_respuesta' => 19
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 10,
            'id_respuesta' => 20,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 10,
            'id_respuesta' => 21
        ]);

        //Pregunta 6
        DB::table('respuestas')->insert([
            'nombre' => 'They are cold-blooded animals. Their body temperature depends on the enviroment.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Their bodies are covered in scales to protect them from wet climates'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They have sexual reproduction. Most of them lay eggs on land'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => "Reptile's eggs have a protective shell"
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 11,
            'id_respuesta' => 22
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 11,
            'id_respuesta' => 23,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 11,
            'id_respuesta' => 24
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 11,
            'id_respuesta' => 25
        ]);

        //Pregunta 7
        DB::table('respuestas')->insert([
            'nombre' => 'They have two wings and two legs'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They are not warm-blooded animals'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They have a beak, but don´t have teeth.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They are covered in feathers.'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 12,
            'id_respuesta' => 26
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 12,
            'id_respuesta' => 27,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 12,
            'id_respuesta' => 28
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 12,
            'id_respuesta' => 29
        ]);

        //Pregunta 8
        DB::table('respuestas')->insert([
            'nombre' => 'They breathe through lungs'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'They reproduce by sexual reproduction. They lay eggs.'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Female mammals produce milk'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Mst of them have four legs and their bodies are covered with fur.'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 13,
            'id_respuesta' => 30
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 13,
            'id_respuesta' => 31,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 13,
            'id_respuesta' => 32
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 13,
            'id_respuesta' => 33
        ]);

        // Pruebas para examen secundario
        DB::table('respuestas')->insert([
            'nombre' => 'FISH'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'AMPHIBIANS'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'REPTILES'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'BIRDS'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'MAMMALS'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 14,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 14,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 14,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 14,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 14,
            'id_respuesta' => 5
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 15,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 15,
            'id_respuesta' => 2,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 15,
            'id_respuesta' => 3
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 15,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 15,
            'id_respuesta' => 5
        ]);
        DB::table('respuestas_examenes')->insert([
            'id_ep' => 16,
            'id_respuesta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 16,
            'id_respuesta' => 2
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 16,
            'id_respuesta' => 3,
            'correcta' => 1

        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 16,
            'id_respuesta' => 4
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 16,
            'id_respuesta' => 5
        ]);


    }
}
