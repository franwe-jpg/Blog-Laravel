<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Phone;
use App\Models\Comment;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            PostTagSeeder::class,
            CommentSeeder::class,
            
        ]);

        Phone::create([
            'number' => '2804334640',
            'user_id' => 1,
        ]);
        

        
    }
}
