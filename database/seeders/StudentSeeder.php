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
            'state'=>'Postulado',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Empresa: Restaurante Barbacoa 
                                Ciudad: Manizales
                                Cargo: Cajero
                                Tiempo laborado: 18 meses
                                Jefe Inmediato: Felipe Perdomo
                                Cargo del Jefe: Administrador
                                Teléfono Empresa: 3159284946',
            'languages'=>'Inglés B1 - Francés A2',
            'score'=>4,
            'hidden' => false,
            'created_at' => '2022-02-21 12:12:24'
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
            'state'=>'Contratado',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Empresa: Restaurante Barbacoa 
                                Ciudad: Manizales
                                Cargo: Cajero
                                Tiempo laborado: 18 meses
                                Jefe Inmediato: Felipe Perdomo
                                Cargo del Jefe: Administrador
                                Teléfono Empresa: 3159284946',
            'languages'=>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'score'=>4, 
            'hidden' => false,
            'created_at' => '2022-02-21 12:12:24'
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
            'work_experience'=>'Empresa: Restaurante Barbacoa 
                                Ciudad: Manizales
                                Cargo: Cajero
                                Tiempo laborado: 18 meses
                                Jefe Inmediato: Felipe Perdomo
                                Cargo del Jefe: Administrador
                                Teléfono Empresa: 3159284946',
            'languages'=>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'score'=>5,
            'hidden' => false,
            'created_at' => '2022-03-21 12:12:24'
        ]);
        /*** para el barchart */
        Student::create([
            'id_user'=>'8',
            'birthday' => '2000-12-20',
            'gender' =>'Hombre',
            'semester' => 2,
            'average'=>3.6,
            'career' =>'Gastronomia',
            'eps'=> 'EPS',
            'blood_type' => 'O-',
            'job_skills'=>'Atención al cliente',
            'office_tools' =>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'work_experience'=>'Empresa: Restaurante Barbacoa 
                                Ciudad: Manizales
                                Cargo: Cajero
                                Tiempo laborado: 18 meses
                                Jefe Inmediato: Felipe Perdomo
                                Cargo del Jefe: Administrador
                                Teléfono Empresa: 3159284946',
            'languages'=>'Cualquier cosa que pase el día de hoy, podemos decir que es un avance',
            'score'=>5,
            'hidden' => false,
            'created_at' => '2022-05-21 12:12:24'
        ]);
    }
}
