<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Alumno::create([
            'matricula' => '1234567890',
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan@gmail.com',
            'fecha_nacimiento' => '2000-01-01',
        ]);
    }
}
