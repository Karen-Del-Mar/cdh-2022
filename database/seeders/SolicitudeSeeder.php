<?php

namespace Database\Seeders;

use App\Models\Solicitude;
use Illuminate\Database\Seeder;

class SolicitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitude::create([
            'document'=>'12345601',
            'name'=> 'Patrick',
            'email' =>'unpatrick@autonoma.edu.co',
            'company'=>'Valkiria',
            'location' => 'Av. Santander #56-25',
            'phone'=>'3105204692',
            'Sector'=>'Entretenimiento',
            'description' => 'Cualquier cosa es la ganancia más grande que tenemos en nuetras manos, tocará que nos depará en el futuro',
      
        ]);
    }
}
