<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 | posts</title>
</head>
<body>
    <h1> aqui se mostrara el post {{ $post }} 
    @if ($category)
        de la categoria {{ $category}}
    @endif
    
</h1>
</body>
</html>