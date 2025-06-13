<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //Post::factory(5)->create(); // Create 5 posts using the factory
       Post::create([
            'title' => 'Primera TCP de Trelew',
            'user_id' => 2,
            'slug' => 'primera-tcp-de-trelew',
            'content' => 'La joven Monserratt con ciudadania Argentina es una de las primeras TCPs que se formaron en la provincia de Chubut. Se formó en el año 2025 en el famoso Aeroclub Almirante Zar. Desde entonces, ha trabajado en diferentes proyectos y actividades para mejorar la calidad de vida de los pasajeros que viajan.',
            'category_id' => '2',
        ]);
        Post::create([
            'title' => 'Nuevo graduado Lic. Sistemas',
            'user_id' => 1,
            'slug' => 'recibido-licenciado-sistemas',
            'content' => 'Franco soler se recibio este 18 de diciembre de 2027.',
            'category_id' => '4',
        ]);
    }
}
