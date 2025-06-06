@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Iniciar sesión</h2>

    <form  action="{{ route('loginStore') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div>
            <p>¿No tienes cuenta? <a href="{{route('register')}}"> Registrate </a>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
