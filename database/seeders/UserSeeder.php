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
        User::factory(5)->create(); //creamos 5 usuarios mas de prueba utilizando el factory. //tambien lo podria llamar en el run de DataSeeder 

        $user = new User();
        $user->name = 'Monserratt Carmen Quiroga Salazar';
        $user->dni = '96.279.430';
        $user->email = 'mmquirogasalazar309@gmail.com';
        $user->password = bcrypt('12345678');   
        $user->save();

        $user = new User();
        $user->name = 'Franco Martin Soler';
        $user->dni = '44601165';
        $user->email = 'franquetcr17@gmail.com';
        $user->password = bcrypt('12345678');   
        $user->save();

        
    }
}
