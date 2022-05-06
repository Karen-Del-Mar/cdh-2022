<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survey::create([
            'q1'=>'5',
            'q2'=>'5',
            'q3'=>'4',
            'q4'=>'4',
            'q5'=>'3',
            'emitter'=>'5',
            'receiver'=>'2'
        ]);
        Survey::create([
            'q1'=>'3',
            'q2'=>'2',
            'q3'=>'3',
            'q4'=>'5',
            'q5'=>'5',
            'emitter'=>'5',
            'receiver'=>'2'
        ]);
        Survey::create([
            'q1'=>'4',
            'q2'=>'4',
            'q3'=>'2',
            'q4'=>'5',
            'q5'=>'4',
            'emitter'=>'5',
            'receiver'=>'2'
        ]);
        Survey::create([
            'q1'=>'4',
            'q2'=>'2',
            'q3'=>'3',
            'q4'=>'5',
            'q5'=>'4',
            'emitter'=>'5',
            'receiver'=>'3'
        ]);
    }
}
