@extends('layouts.app')

@section('title', 'Listado de Posts')

@section('content' )
    <body class="container mt-5">
        
        <a href="/" class="btn btn-secondary mb-3">Volver a Home</a>
        
        <h1>Todos los posts</h1>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Crear nuevo POST</a>

        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <a href="{{ route('post.show', $post) }}" class="btn btn-outline-primary">Ver</a>

            </div>
        </div>

        @endforeach

        {{$posts->links() }}
    </body>
@endsection








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

    <title>Laravel 12 | posts</title>
</head>
<body>
    <h1> Aqui se muestran todos los posts </h1>
    <a href="/posts/create"> Crear nuevo POST</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href= "/posts/{{$post->id}}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>

    {{$posts->links() }}
</body>
</html> -->