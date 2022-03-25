<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::create([
            'experience' => 'Cadena de Honor me brindó la oportunidad de crecer laboralmente fue un proceso maravilloso, eternamente agradecido, nunca voy a olvidar esta experiencia',           
            'id_student' => '1',
            ]);
        
        Experience::create([
            'experience' => 'Aprendí mucho de esta gran experiencia y tengo mucho que agradecer al programa. Me gustó muchisimo!!',           
            'id_student' => '3',
            ]);
    }
}
