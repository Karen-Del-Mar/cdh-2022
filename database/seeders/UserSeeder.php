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
            'rol_id' => '1',
            'created_at' => '2022-02-21 12:12:24'
        ]);

        User::create([
            'document'=>'12345678',
            'name'=> 'Maribel Fernanda García',
            'email' =>'estudiante@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'student-profile-1.jpg',
            'rol_id' => '3',
            'created_at' => '2022-03-21 12:12:24'
        ]);

        User::create([
            'document'=>'1234543212',
            'name'=> 'Jorge Alberto Mongol',
            'email' =>'jorge@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'student-profile-2.jpg',
            'rol_id' => '3',
            'created_at' => '2022-04-21 12:12:24'
        ]);


        User::create([
            'document'=>'9878787876',
            'name'=> 'Juan Camilo Uribe',
            'email' =>'juanc@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'student-profile-3.jpg',
            'rol_id' => '3',
            'created_at' => '2022-05-21 12:12:24'
        ]);


        User::create([
            'document'=>'12345698',
            'name'=> 'Samanta Estupiñan Benavides',
            'email' =>'employer@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'restaurant-profile.svg',
            'rol_id' => '2',
            'created_at' => '2022-02-21 12:12:24'
        ]);


        User::create([
            'document'=>'9898767654',
            'name'=> 'Alberto Cardona',
            'email' =>'albertocardona@autonoma.edu.co',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204692',
            'avatar'=>'bar-profile.svg',
            'rol_id' => '2',
            'created_at' => '2022-03-21 12:12:24'
        ]);

        User::create([
            'document'=>'9898767651',
            'name'=> 'Paulina Vega',
            'email' =>'paulina123@hotmail.com',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204900',
            'avatar'=>'entertainment-profile.svg',
            'rol_id' => '2',
            'created_at' => '2022-04-21 12:12:24'
        ]);

        /** Para visualizar el bar chart */
        /** 8 */
        User::create([
            'document'=>'20220521',
            'name'=> 'Usuario prueba 1',
            'email' =>'up1@hotmail.com',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204900',
            'avatar'=>'student-profile-1.jpg',
            'rol_id' => '3',
            'created_at' => '2022-03-21 12:12:24'
        ]);
        User::create([
            'document'=>'20220221',
            'name'=> 'Usuario prueba 2',
            'email' =>'up2@hotmail.com',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204900',
            'avatar'=>'student-profile2.jpg',
            'rol_id' => '3',
            'created_at' => '2022-02-21 12:12:24'
        ]);
        User::create([
            'document'=>'20220321',
            'name'=> 'Usuario prueba 3',
            'email' =>'up3@hotmail.com',
            'password'=>bcrypt('12345678'),
            'phone'=>'3105204900',
            'avatar'=>'entertainment-profile.svg',
            'rol_id' => '2',
            'created_at' => '2022-03-21 12:12:24'
        ]);
    }
}
