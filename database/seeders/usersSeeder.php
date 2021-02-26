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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'admin' => 1
        ], [
            'name' => 'profesor',
            'email' => 'profesor@example.com',
            'password' => Hash::make('profesor'),
            'profesor' => 1
        ], [
            'name' => 'alumno',
            'email' => 'alumno@example.com',
            'password' => Hash::make('alumno')
        ]);
    }
}
