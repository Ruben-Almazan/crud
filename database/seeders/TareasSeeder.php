<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tareas')->insert([
            'titulo' => 'Titulo de prueba',
            'descripcion' => 'Descripcion de ejemplo',
            'tipo' => 'Escuela',
            'fecha_limite' => '2021-12-12'
        ]);

        DB::table('tareas')->insert([
            'titulo' => 'Titulo de prueba11',
            'descripcion' => 'Descripcion de ejemplo11',
            'tipo' => 'Escuela',
            'fecha_limite' => '2021-12-12'
        ]);
        Tarea::create([
            'titulo' => 'Titulo de prueba22',
            'descripcion' => 'Descripcion de ejemplo22',
            'tipo' => 'Escuela',
            'fecha_limite' => '2021-12-12'
        ]);
    }
}
