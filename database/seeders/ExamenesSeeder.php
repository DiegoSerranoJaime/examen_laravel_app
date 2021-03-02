<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examenes')->insert([
            'nombre' => "Unidad 8: Vertebrados",
            'asignatura' => "Biologia",
            'id_profesor_curso' => 2
        ]);

        DB::table('examenes')->insert([
            'nombre' => "Unidad 7: Hervivoros",
            'asignatura' => "Biologia",
            'id_profesor_curso' => 2
        ]);

        DB::table('examenes_completados')->insert([
            'id_examen' => 2,
            'id_alumno' => 3
        ]);

    }
}
