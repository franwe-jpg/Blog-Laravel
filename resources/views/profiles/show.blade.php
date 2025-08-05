@extends ('layouts.app')

@section('title', 'Mi perfil')

@section('content')
    <a href="{{route('dashboard')}}" class="btn btn-secondary mb-4">Volver a Paneles</a>

    <h1> <strong> Blogger: {{$profile->name}}</strong></h1>
    <br>
    <br>
    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar del usuario" width="150">
    <p> Email: {{$profile->email}}</p>
    <p> Bio: {{$profile->bio}}</p>
    <p> Fecha de creación: {{$profile->created_at}}</p>
    <p> Redes: {{$profile->instagram}}</p>


    <a href="{{route('profile.edit', $profile)}}"> Editar perfil</a>
@endsection



