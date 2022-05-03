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
            'location' => 'Bulevar de la 23',
            'Sector'=>'Restaurante',
            'description' => 'En Grupo SELF S.A.S. buscamos personas apasionadas y comprometidas con su labor para que hagan parte del mejor equipo de trabajo. Si cuentas con las siguientes características, envíanos tu hoja de vida.',
            'score'=>4.5,
            'hidden' => false,
        ]);


        Employer::create([
            'id_user'=>'6',
            'company'=>'La Bohemia Taberna Bar',
            'location' => 'CRA 23 # 20 - 15 Centro',
            'Sector'=>'Bar',
            'description' => 'Somos una empresa de servicios y alimentos que busca crecer y consolidarse como una cadena especializada en pollo, con un amplio menú, con marcas bien posicionadas en el mercado nacional que brinda experiencias agradables atendiendo las necesidades de sus clientes.',
            'score'=>4.8,
            'hidden' => false,
        ]);

        Employer::create([
            'id_user'=>'7',
            'company'=>'Agencia la pradera',
            'location' => 'Cll 10 # 50 - 2 Milán',
            'Sector'=>'Entretenimiento',
            'description' => 'Un lugar para pasar un rato agradable con comida deliciosa',
            'score'=>3.7,
            'hidden' => true,
        ]);
    }
}
