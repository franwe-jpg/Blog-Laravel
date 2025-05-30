@extends('layouts.app')

@section('title', 'posts')

@section('content')
    <body class="container mt-5">
        <a href="{{ route('post.index') }}" class="btn btn-secondary mb-3">Volver a Posts</a>

         <h1 class="mb-3">Título: <span class="text-primary">{{ $post->title }}</span></h1>
    
        <p><strong>Categoría:</strong> {{ $post->category }}</p>

        <p class="mt-3">{{ $post->content }}</p>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Editar post</a>
    
            <form action="{{ route('post.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar post</button>
            </form>
        </div>
        
    </body>
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
    <h1> Titulo: {{$post->title}} </h1>

    <p>
        <b> Categoria: {{$post->category}}</b>
    </p>
    <p> 
        {{$post->content}}
    </p>
    <br>
    <a href="/posts/{{$post->id}}/edit"> Editar post</a>

    <br>
    <form action="/posts/{{$post->id}}" method ="POST">
        @csrf
        @method('DELETE')
        <button type="submit"> Eliminar Post</button>
    </form>



    logica si se pasa el parametro category 
    @if ($category)
        de la categoria {{ $category}}
    @endif
    
</h1>
</body>
</html> -->