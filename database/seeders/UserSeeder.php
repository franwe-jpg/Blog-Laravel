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
        $user = new User();
        $user->name = 'Guillermo Vega';
        $user->email = 'vegaguillermoadrian@gmail.com';
        $user->password = bcrypt('12345678');   
        $user->save();

        User::factory(9)->create(); //creamos 9 usuarios mas de prueba utilizando el factory. //tambien lo podria llamar en el run de DataSeeder 
    }
}
