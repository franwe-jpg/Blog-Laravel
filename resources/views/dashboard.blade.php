@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center mt-5">
        <h1 class="display-4 text-primary">Paneles</h1>
        <a href="{{ route('post.index') }}" class="btn btn-outline-primary mt-4">Ver Posts</a>
        <a href="{{ route('user.index')}}" class="btn btn-outline-primary mt-4">Ver Usuarios</a>
    </div>
@endsection
