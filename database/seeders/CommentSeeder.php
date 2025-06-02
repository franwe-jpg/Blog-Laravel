<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'content' => 'Este es el comentario de prueba 1',
            'post_id' => 1
        ]);
        Comment::create([
            'content' => 'Este es el comentario de prueba 2',
            'post_id' => 1
        ]);
    }
}
