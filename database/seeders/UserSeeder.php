<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory(5)->create(); //creamos 5 usuarios mas de prueba utilizando el factory. //tambien lo podria llamar en el run de DataSeeder 

        $user = new User();
        $user->name = 'ramon';
        $user->dni = '44601586';
        $user->email = 'ramon@example.com';
        $user->password = bcrypt('1234');   
        $user->assignRole('Blogger');
        $user->save();
        
        $user = new User();
        $user->name = 'Franco';
        $user->dni = '1654381';
        $user->email = 'franco@example.com';
        $user->password = bcrypt('1234');   
        $user->assignRole('Admin');
        $user->save();

        
    }
}
