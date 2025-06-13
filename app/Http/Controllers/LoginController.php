<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(){
        return view('logins.register');
    }

    public function registerStore(Request $request){
        $user = User::create([  
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('dashboard'); 
    }

    public function login(){
        return view('logins.login');
    }

    public function loginStore(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard'); 
        }else{
            return redirect()->route('login'); 
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); // Invalida los datos de sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF
        return redirect("/");
    }
}
