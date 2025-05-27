<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>
</html>