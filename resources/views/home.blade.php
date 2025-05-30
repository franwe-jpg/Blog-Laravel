@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center mt-5">
        <h1 class="display-4 text-primary">Bienvenidos a la Página Innovación</h1>
        <p class="lead">Esta es la página principal de tu aplicación Laravel.</p>
        <a href="{{ route('post.index') }}" class="btn btn-outline-primary mt-4">Ver Posts</a>
        
    </div>
@endsection
