@extends('layouts.app')

@section('title', 'Usuario')

@section('content')
    <body class="container mt-5">
        <a href="{{ route('user.index') }}" class="btn btn-secondary mb-3">Volver a Usuarios</a>

         <h1 class="mb-3">Nombre: <span class="text-primary">{{ $user->name }}</span></h1>
    
        <p><strong>DNI:</strong> {{ $user->dni }}</p>

        <p class="mt-3">{{ $user->email }}</p>

        <p class="mt-3" > Telefono: {{ $user->phone->number ?? '-'}}</p>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('user.edit', $user) }}" class="btn btn-warning">Editar usuario</a>
    
            <form action="{{ route('user.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar usuario</button>
            </form>
        </div>
        
        
        

    </body>

@endsection
