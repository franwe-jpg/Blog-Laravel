<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Phone;

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
        $user = User::create([   //creo un user local con los datos del request ya que luego necesito el id para el phone.
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' =>Hash::make($request->password),

        ]);
        if ($request->filled('number')){
            Phone::create([
                'number' => $request->number,
                'user_id' => $user->id,
            ]);
        }
        

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
    
    public function update(UpdateUserRequest $request, User $user, Phone $phone){
        
        

       // Primero actualizas el usuario
    $user->update($request->only(['name', 'dni', 'email', 'password']));

    // Luego actualizas o creas el teléfono
    $user->phone()->updateOrCreate(
        [], // condiciones (vacías porque ya se asocia con el user_id implícitamente)
        ['number' => $request->input('number')]
    );

    return redirect()->route('user.index');
    } 

    Public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
