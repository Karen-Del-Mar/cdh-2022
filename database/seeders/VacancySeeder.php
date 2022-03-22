<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Vacancy;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('Vacancies')->truncate();
       

        Vacancy::create([
            'id_employer' => 1,
            'job' => "Auxiliar de cocina",
            'profile' => "Persona con conocimientos en cocina árabe",
            'payment' => 1200000,
            'availability' => "Fines de semana de 2 a 6 pm",
            'hidden'=>0,
        ]);

        Vacancy::create([
            'id_employer' => 2,
            'job' => "Técnico laboral en salud oral",
            'profile' => "Persona con aptitud y deseo por trabajar y aprender",
            'payment' => 1200000,
            'availability' => "lunes a viernes de 2 a 6pm",
            'hidden'=>0,
        ]);


        Vacancy::create([
            'id_employer' => 1,
            'job' => "Barman",
            'profile' => "Persona con conocimiento en bar",
            'payment' => 500000,
            'availability' => "Todos los días de 6 a 11 pm",
            'hidden'=>0,
        ]);

        Vacancy::create([
            'id_employer' => 2,
            'job' => "Auxiliar de enfermería",
            'profile' => "Persona con conocimiento en  cuidar aldultos mayores",
            'payment' => 500000,
            'availability' => "Todos los días de 6 a 11 pm",
            'hidden'=>0,
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
