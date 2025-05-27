<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        return view('posts.index',[
            'posts' => $posts       //pasamos los posts en un arreglo a la vista
        ]); 
    }

  

    
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        // return $request->all(); //retornamos todos los datos que nos llegan por el metodo post, para ver si se estan enviando correctamente
        $post = New Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->save();
        return redirect('/posts'); //redireccionamos a la ruta /posts
    }

      
    public function show($post, $category=null){ //el segundo parametro es opcional, si no se pasa se le asigna null 
        // compact('post', 'category') ==> ['post' => $post, 'category' => $category] la funcion compact crea un array asociativo con los nombres de las variables y sus valores
        $post = Post::find($post); //buscamos el post por su id, si no existe devuelve null
        return view('posts.show', [    //retornamos la vista posts.show y le pasamos los datos del post y la categoria
            'post' => $post,
            'category' => $category
        ]); 
    }
    
    public function edit($post){
        $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post  //pasamos el post a la vista
        ]); 
    }
    
        public function update(Request $request, $post){
            $post = Post::find($post); //buscamos el post por su id
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category = $request->category;
            $post->save(); //guardamos los cambios
            return redirect('/posts'); //redireccionamos a la ruta /posts
        } 

}