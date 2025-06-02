<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    Public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->with('phone')
            ->paginate(7);
        return view('users.index', ['users' => $users]);
    }

    Public function create(){
        return view('users.create');
    }

    Public function store(StoreUserRequest $request){
        User::create([
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' =>bcrypt('$request->password')
        ]);
         return redirect()->route('user.index');
    }

    Public function show(User $user){
        return view('users.show', [
            'user' => $user 
        ]);
    }

    public function edit(User $user){
        return view('users.edit', [
            'user' => $user  //pasamos el post a la vista
        ]); 
    }
    
    public function update(UpdateUserRequest $request, User $user){
        //otra forma de cargar un objeto (recomendable es usar fillable)

        $user->name = $request->name;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //encriptamos la contraseña
        $user->save(); //guardamos los cambios en la base de datos

        
        return redirect()->route('user.index'); //redireccionamos a la ruta /posts
    } 

    Public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
