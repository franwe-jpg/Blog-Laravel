@extends ('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
    <div class="container mt-5">

        <a href="{{ route('user.show', $user) }}" class="btn btn-secondary mb-4">Volver a Usuario</a>

        <h1 class="mb-4 text-primary">Editar Usuario</h1>

        <form action="{{route ('user.update', $user)}}" method= "POST">
            @csrf
            @method ('PUT')
            
            <div class="mb-3">
                <label class="form-label w-100">
                    Nombre y Apellido:
                    <input type="text" name="name" class="form-control mt-1" placeholder="ingrese el nombre" value="{{old('name', $user->name)}}">
                </label>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            
            <div class="mb-3">
                <label class="form-label w-100">
                    DNI:
                    <input type="text" name="dni" class="form-control mt-1" placeholder="Ingrese el DNI" value="{{old('dni', $user->dni)}}">
                </label>
            </div>
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label w-100">
                    Telefono:
                    <input type="text" name="number" value="{{$user->phone->number ?? '' }}" class="form-control mt-1" placeholder="Ingrese el Telefono">
                </label>
            </div>
            @error('number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label class="form-label w-100">
                    Email:
                    <input type="text" name="email" class="form-control mt-1" placeholder="Ingrese el email" value="{{old('email', $user->email)}}">
                </label>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label w-100">
                    Contraseña:
                    <input type="text" name="password" class="form-control mt-1" placeholder="Ingrese la contraseña" value="{{old('password')}}">
                </label>
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

           <!-- Checkboxes para Roles -->
            Roles:
            @foreach($roles as $role)
                <div class="form-check" >
                    <input 
                        type="checkbox" 
                        name="roles[]" 
                        value="{{ $role->name }}" 
                        id="role_{{ $role->id }}" 
                        class="form-check-input"
                    >
                    <label for="role_{{ $role->id }}" class="form-check-label">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach


            <button type="submit" class="btn btn-primary">Enviar</button>


        </form>

    </div>

@endsection