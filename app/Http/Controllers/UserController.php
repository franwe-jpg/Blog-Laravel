<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    Public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->paginate(10);
        return view('users.index', ['users' => $users]);
    }

    Public function create(){
        return view('users.create');
    }

    Public function store(StoreUserRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt('$request->password')
        ]);
    }

    Public function show(User $user){
        return view('users.show', [
            'user' => $user 
        ]);
    }

    Public function delete(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }
}
