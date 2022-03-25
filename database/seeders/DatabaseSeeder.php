<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(VacancySeeder::class);
        $this->call(SolicitudeSeeder::class);
        $this->call(PostulateSeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(ExperienceSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
