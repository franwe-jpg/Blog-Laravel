<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController; //importamos el controlador homeController para utilizar su metodo index en el get de: /
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController; //importamos el controlador UserController para utilizarlo en la ruta de prueba
use App\Http\Controllers\LoginController;
use App\Models\Post; //importamos el modelo Post para utilizarlo en la ruta de prueba
use Illuminate\Auth\Events\Login;
use Illuminate\Container\Attributes\Auth;

Route::get('/', [HomeController::class, '__invoke']); // Sin pasar parametros ya que el controlador solo tiene un metodo __invoke

Route::get('/dashboard', [homeController::class, 'dashboard' ])->middleware('auth')->name('dashboard');

Route::resource('post', PostController::class); //con esta linea creamos todas las rutas necesarias para el controlador PostController, es decir, las rutas de index, create, store, show, edit, update y destroy.
    
Route::resource('user', UserController::class); //con esta linea creamos todas las rutas necesarias para el controlador UserController, es decir, las rutas de index, create, store, show, edit, update y destroy.

Route::resource('comment', CommentController::class);


Route::get('/login', [Logincontroller::class, 'login'])->name('login');
Route::post('/loginStore', [LoginController::class, 'loginStore'])->name('loginStore');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerStore', [LoginController::class, 'registerStore'])->name('registerStore');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');   



Route::get('/prueba', function () {
        
    $post = Post::OrderBy('id','desc')
            ->first();
    $post->tags()->attach([1,2]); //asociamos los tags 1 y 2 al post.
    return("cambios hechos");
});

/*  CREACION DE RUTAS MANUALES
Route::get('/posts', [PostController::class,'index'] )->name('post.index'); //de esta forma la logica esta en el controlador y no ensuciamos el archivo de rutas.

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');

Route::post(('/posts'), [PostController::class, 'store'])->name('post.store'); //ruta para guardar un nuevo post, el metodo store se encarga de guardar el post en la base de datos

Route::get(('/posts/{post}/edit'), [PostController::class, 'edit'])->name('post.edit');  //ruta para editar un post, el metodo edit se encarga de mostrar el formulario de edicion del post

Route::put(('/posts/{post}'), [PostController::class, 'update'])->name('post.update'); //ruta para actualizar un post, el metodo update se encarga de actualizar el post en la base de datos

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');//ruta para eliminar un post, el metodo destroy se encarga de eliminar el post de la base de datos

Route::get('/posts/{post}/{category?}', [PostController::class, 'show'])->name('post.show'); //ruta para mostrar un post

 */


/*
Route::get('/prueba', function () {
  
      Crear nuevo regitro de post
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
    
}); 
*/
