<?php

namespace Database\Seeders;
use App\Models\Skill;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'skill' =>'Atención al cliente'
        ]);
        Skill::create([
            'skill' =>'Habilidades comunicativas'
        ]);
        Skill::create([
            'skill' =>'Trabajo en equipo'
        ]);
        Skill::create([
            'skill' =>'Creatividad'
        ]);
    }
}
