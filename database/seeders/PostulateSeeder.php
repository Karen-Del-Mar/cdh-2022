<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Postulate;

class PostulateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postulate::create([
            'id_student' => 1,
            'id_vacancy' => 1,
        ]);
    }
}
