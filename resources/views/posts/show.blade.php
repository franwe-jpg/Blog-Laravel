<!DOCTYPE html>
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


    <!-- logica si se pasa el parametro category -->
    <!-- @if ($category)
        de la categoria {{ $category}}
    @endif -->
    
</h1>
</body>
</html>