@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')

    <a href="{{ route('profile.show', $profile) }}" class="btn btn-secondary mb-4">Volver a Perfil</a>

    <h1> <strong> Editar perfil </strong> </h1>


    <form action="{{ route('profile.update', $profile) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Avatar -->
        <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control">
            @error('avatar')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            @if ($profile->avatar)
                <div class="mt-2">
                    <strong>Avatar actual:</strong><br>
                    <img src="{{ asset('storage/' . $profile->avatar) }}" width="120" class="rounded shadow">
                </div>
            @endif
        </div>

        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $profile->name) }}">

        <label>Correo:</label>
        <input type="text" name="email" value="{{ old('name', $profile->email) }}">

        <label>Biografía:</label>
        <textarea name="bio">{{ old('bio', $profile->bio) }}</textarea>

        <label>Instagram:</label>
        <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram) }}">

        <label>Contraseña:</label>
        <input type="text" name="password" >
        
    <button type="submit">Actualizar</button>
</form>
@endsection

