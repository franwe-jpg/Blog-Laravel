@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')

    <h1> <strong> Editar perfil </strong> </h1>
    <form action="{{ route('profile.update', $profile) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Avatar (URL):</label>
    <input type="text" name="avatar" value="{{ old('avatar', $profile->avatar) }}">

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ old('name', $profile->name) }}">

    <label>Correo:</label>
    <input type="text" name="email" value="{{ old('name', $profile->email) }}">

    <label>Biografía:</label>
    <textarea name="bio">{{ old('bio', $profile->bio) }}</textarea>

    <label>Instagram:</label>
    <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram) }}">

    <label>Contraseña:</label>
    <input type="text" name="password" value="{{ old('password', $profile->password) }}">
    
    <button type="submit">Actualizar</button>
</form>
@endsection

