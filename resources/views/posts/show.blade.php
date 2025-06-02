@extends('layouts.app')

@section('title', 'posts')

@section('content')
<div class="container py-5">

    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary mb-4">
        ← Volver a Posts
    </a>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-3">Título: <span class="text-primary">{{ $post->title }}</span></h2>

            <p class="mb-1"><strong>Categoría:</strong> {{ $post->category }}</p>
            <p class="mt-3">{{ $post->content }}</p>

            @if($post->tags->count())
                <div class="mt-3">
                    <strong>Tags:</strong>
                    <span class="d-inline-flex flex-wrap gap-2 fst-italic">
                        @foreach($post->tags as $tag)
                            <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                        @endforeach
                    </span>
                </div>
            @endif

            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('post.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Comentarios:</h4>
        @forelse($post->comments as $comment)
            <div class="mb-2 p-3 border rounded bg-light">
                {{ $comment->content }}
            </div>
        @empty
            <p class="text-muted">No hay comentarios.</p>
        @endforelse
    </div>

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