<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:post.create')->only('create', 'store');
        $this->middleware('can:post.edit')->only('edit','update');
        $this->middleware('can:post.destroy')->only('destroy');
    }

    public function index(){
        $posts = Post::orderBy('id', 'desc')
            ->with('comments')
            ->paginate(7);
        return view('posts.index',[
            'posts' => $posts       //pasamos los posts en un arreglo a la vista
        ]); 
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create',[
            'categories' => $categories]);
    }

    public function store(StorePostRequest $request){
        // StorePostRequest es una clase que extiende de FormRequest y contiene las reglas de validacion
        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Post::generateSlug($request->title), //generamos el slug a partir del titulo
            'content' => $request->content,
            'category_id' => $request->category
        ]);         

        return redirect()->route('post.index'); //redireccionamos a la ruta /posts   
    }

      
    public function show(Post $post, $category=null){ // Post $post busca previo por id y encuentra el $post.   el segundo parametro es opcional, si no se pasa se le asigna null 
        // compact('post', 'category') ==> ['post' => $post, 'category' => $category] la funcion compact crea un array asociativo con los nombres de las variables y sus valores
  
        return view('posts.show', [    //retornamos la vista posts.show y le pasamos los datos del post y la categoria
            'post' => $post,

        ]); 
    }
    
    public function edit(Post $post){
        $categories = Category::all();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,  //pasamos el post a la vista
        ]); 
    }
    
    public function update(UpdatePostRequest $request, Post $post){
        //otra forma de cargar un objeto (recomendable es usar fillable)

        $post->title = $request->title;
        $post->slug = Post::generateSlug($request->title); //generamos el slug a partir del titulo
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->save(); //guardamos los cambios
        return redirect()->route('post.index'); //redireccionamos a la ruta /posts
    } 

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');

    }


    public function misPostsIndex(){
        $posts = Post::where('user_id', Auth::user()->id)
            ->orderBy('id','desc')
            ->paginate(10);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
}