<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'tipo' => 'admin'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'profesor',
                'email' => 'profesor@example.com',
                'password' => Hash::make('profesor'),
                'tipo' => 'profesor',
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'alumno',
                'email' => 'alumno@example.com',
                'password' => Hash::make('alumno')
            ]
        );

        DB::table('users_cursos')->insert(
            [
                'id_curso' => 1,
                'id_usuario' => 2
            ]
        );

        DB::table('users_cursos')->insert(
            [
                'id_curso' => 1,
                'id_usuario' => 3
            ]
        );
    }
}
