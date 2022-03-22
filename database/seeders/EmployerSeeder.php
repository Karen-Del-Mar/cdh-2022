<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Employer::create([
            'id_user'=>'5',
            'company'=>'SELF S.A.S',
            'location' => 'Cualquier parte del mundo',
            'Sector'=>'Restaurante',
            'description' => 'Cualquie cosa es la ganancia más grande que tenemos en nuetras manos, tocará que nos depará en el futuro',
            'score'=>4,
            'hidden' => false,
        ]);


        Employer::create([
            'id_user'=>'6',
            'hidden' => false,
            'company'=>'UNIVERSIDAD AUTONOMA DE MANIZALES',
            'location' => 'Cualquier parte del mundo',
            'Sector'=>'Bar',
            'description' => 'Cualquie cosa es la ganancia más grande que tenemos en nuetras manos, tocará que nos depará en el futuro',
            'score'=>4,
            'hidden' => false,
        ]);
    }
}
