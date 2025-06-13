@extends ('layouts.app')

@section('title', 'Mi perfil')

@section('content')
    <h1> <strong> Blogger: {{$profile->name}}</strong></h1>

    <a href="{{route('profile.edit', $profile)}}"> Editar perfil</a>
@endsection