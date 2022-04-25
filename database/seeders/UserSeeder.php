<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'document'=>'123456',
            'name'=> 'Administrador del sistema',
            'email' =>'admin@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'rol_id' => '1'
        ]);

        User::create([
            'document'=>'12345678',
            'name'=> 'Maribel Fernanda García',
            'email' =>'estudiante@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'rol_id' => '3'
        ]);

        User::create([
            'document'=>'1234543212',
            'name'=> 'Jorge Alberto Mongol',
            'email' =>'jorge@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'rol_id' => '3'
        ]);


        User::create([
            'document'=>'9878787876',
            'name'=> 'Juan Camilo Uribe',
            'email' =>'juanc@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'rol_id' => '3'
        ]);


        User::create([
            'document'=>'12345698',
            'name'=> 'Samanta Estupiñan Benavides',
            'email' =>'employer@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'restaurant-profile.svg',
            'rol_id' => '2'
        ]);


        User::create([
            'document'=>'9898767654',
            'name'=> 'Alberto Cardona',
            'email' =>'albertocardona@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'bar-profile.svg',
            'rol_id' => '2'
        ]);

        User::create([
            'document'=>'9898767651',
            'name'=> 'Paulina Vega',
            'email' =>'paulina123@hotmail.com',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204900',
            'avatar'=>'entertainment-profile.svg',
            'rol_id' => '2'
        ]);
    }
}
