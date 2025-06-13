
@extends ('layouts.app')

@section ('title', 'Usuarios')

@section('content' )
    
    @if(session('info'))
        <div class='alert alert=success'>
            <strong> {{session('info')}}</strong>
        </div>
    @endif

    <body class="container mt-5">
        
        <a href="dashboard" class="btn btn-secondary mb-3">Volver a los paneles</a>
        
        <h1>Todos los Usuarios</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Crear nuevo Usuario</a>

        @foreach ($users as $user)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name}} </h5>
                <a href="{{ route('user.show', $user) }}" class="btn btn-outline-primary">Ver</a>

            </div>
        </div>

        @endforeach

        {{$users->links() }}
    </body>
@endsection

