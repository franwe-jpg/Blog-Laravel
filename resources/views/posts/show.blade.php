@extends('layouts.app')

@section('title', 'posts')

@section('content')

<div class="container py-5">

    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary mb-4">
        ← Volver a Posts
    </a>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-3">Título: <span class="text-primary">{{ $post->title }}</span></h2>

            <p class="mb-1"><strong>Categoría:</strong> {{ $post->category->name }}</p>
            <p>
                Autor: <a href="{{route('profile.show', $post->user) }}"> {{$post->user->name}}</a>
            </p>    
            
            <p class="mt-3">{{ $post->content }}</p>

            @if($post->tags->count())
                <div class="mt-3">
                    <strong>Tags:</strong>
                    <span class="d-inline-flex flex-wrap gap-2 fst-italic">
                        @foreach($post->tags as $tag)
                            <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                        @endforeach
                    </span>
                </div>
            @endif

            <div class="mt-4 d-flex gap-3">
                
                @if (auth()->id() === $post->user_id || auth()->user()->hasRole('Admin'))
                    <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Editar</a>
                @endif
                
                @if (auth()->id() === $post->user_id || auth()->user()->hasRole('Admin'))
                    <form action="{{ route('post.destroy', $post) }}" method="POST"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                @endif

            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Comentarios:</h4>
        @forelse($post->comments as $comment)
            <div class="mb-2 p-3 border rounded bg-light">
                De: {{ $comment->user->name }}
                <br>
                {{ $comment->title }}
                <br>
                    {{ $comment->content }}
                <br>

                @can('comment.edit')

                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#editCommentModal">
                        Editar
                    </button>

                @endcan

                @can('comment.destroy')
                    <form action="{{ route('comment.destroy', $comment) }}" method="POST"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                @endcan
            </div>
            

        @empty
            <p class="text-muted">No hay comentarios.</p>
        @endforelse
    </div>

    <!-- Botón para abrir modal -->
    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#createCommentModal">
        Comentar
         
    </button>

    @isset($comment)
        @include('comments._edit_modal')
    @endisset
    
    @include ('comments._create_modal') 
    
</div>

@if ($errors->any())
<script>
    const modal = new bootstrap.Modal(document.getElementById('commentModal'));
    modal.show();
</script>
@endif

@endsection
