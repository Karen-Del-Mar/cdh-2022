<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([  
            'id_user'=>'2',        
            'semester' => 3,
            'average'=>4.5,
            'birthday' => '2000-12-20',
            'gender' =>'Mujer',
            'career' =>'Ing. Sistemas',
            'eps'=> 'SURA',
            'blood_type' => 'AB-',
            'job_skills'=>'Atención al cliente',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Mesera en un lugar de la mancha',
            'languages'=>'Inglés B1 - Francés A2',
            'score'=>4,
            'hidden' => false,
        ]);

        Student::create([      
            'id_user'=>'3',
            'semester' => 5,
            'average'=>3.5,
            'birthday' => '2000-12-20',
            'gender' =>'Hombre',
            'career' =>'Diseño industrial',
            'eps'=> 'EPS',
            'blood_type' => 'O-',
            'job_skills'=>'Habilidades comunicativas',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Barman en Skal',
            'languages'=>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'score'=>4,
            'hidden' => false,
        ]);

        Student::create([
            'id_user'=>'4',
            'birthday' => '2000-12-20',
            'gender' =>'Hombre',
            'semester' => 2,
            'average'=>3.4,
            'career' =>'Ing. Industrial',
            'eps'=> 'EPS',
            'blood_type' => 'O-',
            'job_skills'=>'Atención al cliente',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Empresa de seguros',
            'languages'=>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'score'=>5,
            'hidden' => false,
        ]);
    }
}
