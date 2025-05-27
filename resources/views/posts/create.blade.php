<!DOCTYPE html>
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
</html>