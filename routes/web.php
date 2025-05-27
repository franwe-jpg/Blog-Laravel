<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController; //importamos el controlador homeController para utilizar su metodo index en el get de: /
use App\Http\Controllers\PostController;
use App\Models\Post; //importamos el modelo Post para utilizarlo en la ruta de prueba

Route::get('/', HomeController::class); // Sin pasar parametros ya que el controlador solo tiene un metodo __invoke

Route::get('/posts', [PostController::class,'index'] ); //de esta forma la logica esta en el controlador y no ensuciamos el archivo de rutas.

Route::get('/posts/create', [PostController::class,'create'] );

Route::get('/posts/{post}/{category?}', [PostController::class, 'show']); //de esta forma se le indica a laravel que la variable category es opcional);  


//en laravel importan el orden de las rutas.

//laravel trabaja con las sig peticiones:
//GET: obtener datos
//POST: guardar datos
//PUT: actualizar datos
//PATCH: actualizar parcialmente datos 
//DELETE: eliminar datos 

Route::get('/prueba', function () {
  
     /* Crear nuevo regitro de post
        $post = new Post;    
        $post->Title= 'pRUEBA dE titUlo 7';
        $post-> content = 'Pueba de contenido 7';
        $post->category = 'Prueba de categoria 7';
        $post->save();
        return $post;
       
    */

    /*Actualizar un registro
        $post = Post::where('category','voluptatem')->first();
        $post->category = 'categoria programador'; 
        $post->save();
        return $post;
    */

    /* Actualizar varios registros
        $posts = Post::where('category','=','categoria programador')->get();
            foreach ($posts as $post) {
                $post->category = 'DEVELOPER'; 
                $post->save();                        
            }
    */
  /*  Listar registros
   $posts = Post::where('category','=','DEVELOPER')
        ->select('id','title') //seleccionamos los campos que queremos mostrar
        ->take(2) //limitamos la cantidad de registros a 2
        ->get(); //obtenemos los registros
    return $posts;  
     
    */
    /* eliminar un registro
    $post = Post::find(6);
    $post ->delete(); //eliminamos el registro;
    return "objeto eliminado correctamente";
    */

});