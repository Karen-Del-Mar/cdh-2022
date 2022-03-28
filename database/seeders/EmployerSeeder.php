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
            'description' => 'Cualquier cosa es la ganancia más grande que tenemos en nuetras manos, tocará que nos depará en el futuro',
            'score'=>4,
            'hidden' => false,
        ]);


        Employer::create([
            'id_user'=>'6',
            'company'=>'UNIVERSIDAD AUTONOMA DE MANIZALES',
            'location' => 'Cualquier parte del mundo',
            'Sector'=>'Bar',
            'description' => 'Cualquier cosa es la ganancia más grande que tenemos en nuetras manos, tocará que nos depará en el futuro',
            'score'=>4,
            'hidden' => false,
        ]);

        Employer::create([
            'id_user'=>'7',
            'company'=>'Restaurante la pradera',
            'location' => 'Milán',
            'Sector'=>'Bar',
            'description' => 'Un lugar para pasar un rato agradable con comida deliciosa',
            'score'=>4,
            'hidden' => true,
        ]);
    }
}
