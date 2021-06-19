<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrerass')->insert([
            'clave' => 'INNI2',
            'carrera' => 'INFORMÁTICA', ]);
        DB::table('carrerass')->insert([
            'clave' => 'INCO2',
            'carrera' => 'COMPUTACION', ]);
        
        //Carrera::create(['clave' => 'INCO22', 'carrera' => 'COMPUTACION', ]);
    
    }
}
