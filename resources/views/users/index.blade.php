
@extends ('layouts.app')

@section ('title', 'Usuarios')

@section('content' )
    <body class="container mt-5">
        
        <a href="/" class="btn btn-secondary mb-3">Volver a Home</a>
        
        <h1>Todos los Usuarios</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Crear nuevo Usuario</a>

        @foreach ($users as $user)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name}} </h5>
                <p class="card-text">DNI: {{ $user->dni }}</p>
                <a href="{{ route('user.show', $user) }}" class="btn btn-outline-primary">Ver</a>

            </div>
        </div>

        @endforeach

        {{$users->links() }}
    </body>
@endsection

