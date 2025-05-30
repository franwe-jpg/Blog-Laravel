<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function generateSlug($title){
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
           
        return $slug;
    }

    public function index(){
        $posts = Post::orderBy('id', 'desc')
            ->paginate(5);
        return view('posts.index',[
            'posts' => $posts       //pasamos los posts en un arreglo a la vista
        ]); 
    }

    public function create(){
        return view('posts.create');
    }

    public function store(StorePostRequest $request){
        // StorePostRequest es una clase que extiende de FormRequest y contiene las reglas de validacion
        Post::create([
            'title' => $request->title,
            'slug' => $this->generateSlug($request->title), //generamos el slug a partir del titulo
            'content' => $request->content,
            'category' => $request->category
        ]);         

        return redirect()->route('post.index'); //redireccionamos a la ruta /posts   
    }

      
    public function show(Post $post, $category=null){ // Post $post busca previo por id y encuentra el $post.   el segundo parametro es opcional, si no se pasa se le asigna null 
        // compact('post', 'category') ==> ['post' => $post, 'category' => $category] la funcion compact crea un array asociativo con los nombres de las variables y sus valores
  
        return view('posts.show', [    //retornamos la vista posts.show y le pasamos los datos del post y la categoria
            'post' => $post,
            'category' => $category
        ]); 
    }
    
    public function edit(Post $post){
        return view('posts.edit', [
            'post' => $post  //pasamos el post a la vista
        ]); 
    }
    
    public function update(UpdatePostRequest $request, Post $post){
        //otra forma de cargar un objeto (recomendable es usar fillable)

        $post->title = $request->title;
        $post->slug = $this->generateSlug($request->title); //generamos el slug a partir del titulo
        $post->content = $request->content;
        $post->category = $request->category;
        $post->save(); //guardamos los cambios
        return redirect()->route('post.index'); //redireccionamos a la ruta /posts
    } 

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');

    }

}