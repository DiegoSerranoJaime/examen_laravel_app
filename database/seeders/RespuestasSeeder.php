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
        DB::table('respuestas')->insert([
            'nombre' => 'Fish: shark, salmon, tuna, dolphin'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Amphibians: forg, newt, salamander, toad'
        ]);

        DB::table('respuestas')->insert([
            'nombre' => 'Paco'
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 1,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 1,
            'id_respuesta' => 2,
            'correcta' => 0
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 1,
            'correcta' => 1
        ]);

        DB::table('respuestas_examenes')->insert([
            'id_ep' => 2,
            'id_respuesta' => 3,
            'correcta' => 0
        ]);
    }
}
