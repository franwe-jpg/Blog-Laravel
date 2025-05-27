<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index',[
            'posts' => $posts       //pasamos los posts a la vista
        ]); 
    }

    public function create(){
        return view('posts.create');
    }

    public function show($post, $category=null){ //el segundo parametro es opcional, si no se pasa se le asigna null 
        // compact('post', 'category') ==> ['post' => $post, 'category' => $category] la funcion compact crea un array asociativo con los nombres de las variables y sus valores

        return view('posts.show', [
            'post' => $post,
            'category' => $category
        ]); 
    }
}
