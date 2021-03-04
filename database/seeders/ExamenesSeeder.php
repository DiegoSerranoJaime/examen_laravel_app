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
            'id_profesor_curso' => 1
        ]);

        DB::table('examenes')->insert([
            'nombre' => "Unidad 9: Vertebrados",
            'asignatura' => "Biologia",
            'id_profesor_curso' => 1
        ]);
    }
}
