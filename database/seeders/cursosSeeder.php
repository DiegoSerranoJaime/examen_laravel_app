<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'nombre' => '1ESO E'
            ],
            [
                'nombre' => '1ESO F'
            ],
            [
                'nombre' => '1ESO G'
            ],
            [
                'nombre' => '1ESO H'
            ]
        ]);
    }
}
