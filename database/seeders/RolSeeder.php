<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('rols')->insert([
            'key' => 'admin',
            'rol' => 'Administrador',
            'description'=> 'Tiene permisos globales al sistema',
        ]);

        DB::table('rols')->insert([
            'key' => 'employer',
            'rol' => 'Empleador',
            'description'=> 'Tiene permisos a algunos módulos del sistema',
        ]);

        DB::table('rols')->insert([
            'key' => 'student',
            'rol' => 'Estudiante',
            'description'=> 'Tiene permisos a algunos módulos del sistema',
        ]);
        // Rol::create([
        //     'key' => 'admin',
        //     'rol' => 'Administrador',
        //     'description'=> 'Tiene permisos globales al sistema',
        // ]);

        // Rol::create([
        //     'key' => 'employer',
        //     'rol' => 'Empleador',
        //     'description'=> 'Tiene permisos a algunos módulos del sistema',
        // ]);

        // Rol::create([
        //     'key' => 'student',
        //     'rol' => 'Estudiante',
        //     'description'=> 'Tiene permisos a algunos módulos del sistema',
        // ]);
    }
}
