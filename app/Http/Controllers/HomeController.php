<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class HomeController extends Controller
{
    public function __invoke() // se utiliza cuando un controlador solo tiene un metodo
    {
        return view('home'); //retorna la vista home.blade.php
    }
    public function dashboard(){
        return view('dashboard');
    }

}
