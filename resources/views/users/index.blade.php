@extends ('layouts.app')

@section ('title', 'Usuarios')

@section('content')
    <body>
        <a href="/"> Volver a home</a>
        <h1>Listado de usuarios</h1>

        <a href="{{route('user.create')}}"> Crear usuario</a>

        @foreach ($users as $user)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name, $user->dni}}</h5>
                    <a href="{{ route('user.show', $user) }}" class="btn btn-outline-primary">Ver</a>

                </div>
            </div>
        @endforeach

        {{$users->links() }}
    </body>