@extends ('layouts.app')
@section('title', 'Crear Usuario')
@section('content')
    <div class="container mt-5">

        <a href="{{ route('user.index') }}" class="btn btn-secondary mb-4">← Volver a Posts</a>

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
                    <input type="text" name="category" class="form-control mt-1" placeholder="Ingrese la categoría" value="{{old('category')}}">
                </label>
            </div>
            @error('category')
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