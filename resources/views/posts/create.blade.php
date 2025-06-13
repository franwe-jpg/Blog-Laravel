
@extends('layouts.app')

@section('title', 'Crear')

@section('content')
    <div class="container mt-5">

        <a href="{{ route('post.index') }}" class="btn btn-secondary mb-4">← Volver a Posts</a>

        <h1 class="mb-4 text-primary">Crear un nuevo Post</h1>

        <form action="{{route ('post.store')}}" method= "POST">
            @csrf

            
            <div class="mb-3">
                <label class="form-label w-100">
                    Título:
                    <input type="text" name="title" class="form-control mt-1" placeholder="ingrese el título" value="{{old('title')}}">
                </label>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            <div class="mb-3">
                <label class="form-label w-100">
                    Categoría:
                    <select name="category" class="form-control mt-1"> 
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            @error('category->id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="mb-3">
                <label class="form-label w-100">
                    Contenido:
                    <textarea name="content" class="form-control" rows="4" placeholder="Escribe el contenido..."> {{old('content')}}</textarea>
                </label>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Enviar</button>


        </form>

    </div>
@endsection




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 | posts</title>
</head>
<body>
    <a href="/posts"> Volver a Posts </a>
    <br>
    <h1> Aqui se mostrara el formulario para crear un post </h1>
    <br>
    
    <form action="/posts" method="POST">
        @csrf
        <label>
            Titulo:
            <input type="text" name= 'title'>
        </label>

        <br>
        <br>

        <label >
            Categoria:
            <input type="text" name= 'category'>
        </label>
        <br>
        <br>
        <label>
            Contenido:
            <textarea name="content"></textarea>
        </label>
        <br>
        <br>
        <button type="submit"> Enviar </button>
    </form>

</body>
</html> -->