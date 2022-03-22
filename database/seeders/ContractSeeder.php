<?php

namespace Database\Seeders;
use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::create([
        'start_date' => '2023-01-01',
        'final_date' => '2050-01-01',
        'job' => 'Esclavo',
        'payment' => 450000,
        'id_student' => '2',
        'id_employer' => '2',      
        'description' => 'Trabajar sin descansar'
        ]);
    }
}
