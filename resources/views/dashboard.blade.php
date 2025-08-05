@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div>
        <p> Sesion activa: {{Auth()->user()->name}} </p> 
    </div>
    <div class="text-center mt-5">
        <h1 class="display-4 text-primary">Paneles</h1>
        <a href="{{ route('post.index') }}" class="btn btn-outline-primary mt-4">Ver todos los Posts</a>

        @can('user.index')
            <a href="{{ route('user.index')}}" class="btn btn-outline-primary mt-4">Ver Usuarios</a>
        @endcan

        <a href="{{ route('misPosts')}}" class="btn btn-outline-primary mt-4">Mis posts</a>
        <a href="{{ route('profile.show', Auth::User()) }}" class="btn btn-outline-primary mt-4">Ver mi perfil</a>

    </div>
    <form method="POST" action="{{ route('logout.local') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
    </form>

    
@endsection
