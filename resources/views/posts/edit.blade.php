@extends('layouts.app')

@section('title', 'editar')

@section ('content')
    <body class=container mt-5>
         <a href="{{ route('post.index') }}" class="btn btn-secondary mb-3">Volver a Posts</a>

         <h1 class="mb-4">Editar post</h1>

        <form action="{{route ('post.update', $post) }}" method= "POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label w-100">
                    Título:
                    <input type="text" name="title" class="form-control mt-1" value="{{old('title', $post->title) }}" >
                </label>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label w-100">
                    Categoría:
                    <input type="text" name="category" class="form-control mt-1" value="{{old('category', $post->category) }}">
                </label>
            </div>
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label w-100">
                    Contenido:
                    <textarea name="content" class="form-control mt-1" rows="5">{{ old('content', $post->content)}}</textarea>
                </label>
            </div>
              
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Actualizar post</button>


        </form>

    </body>
@endsection



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 | edit</title>
</head>
<body>
    <a href="/posts"> Volver a Posts </a>
    <br>
    <h1> Aqui se mostrara el formulario para editar un post </h1>
    <br>
    
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')    

        <label>
            Titulo:
            <input type="text" name= 'title' value="{{$post->title}}">
        </label>

        <br>
        <br>

        <label >
            Categoria:
            <input type="text" name= 'category' value="{{$post->category}}">
        </label>
        <br>
        <br>
        <label>
            Contenido:
            <textarea name="content"> {{$post->content}}"</textarea>
        </label>
        <br>
        <br>
        <button type="submit"> Actualizar post </button>
    </form> 

</body>
</html> -->