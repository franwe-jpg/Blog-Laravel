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

            <p class="mb-1"><strong>Categoría:</strong> {{ $post->category }}</p>
            <p class="mb-1"> <strong>Autor:</strong> {{auth()->user()->name}}</p>
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
                <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('post.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Comentarios:</h4>
        @forelse($post->comments as $comment)
            <div class="mb-2 p-3 border rounded bg-light">
                De: {{ $post->user->name }}
                <br>
                {{ $comment->content }}
            </div>  
        @empty
            <p class="text-muted">No hay comentarios.</p>
        @endforelse
    </div>

    <!-- Botón para abrir modal -->
    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#commentModal">
        Comentar
    </button>

    <!-- Modal de comentario -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('comment.store') }}" method="POST" onsubmit="closeModal()">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Nuevo Comentario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        
                        <div class="mb-3">
                            <label class="form-label">Título:</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contenido:</label>
                            <textarea name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Script opcional para cerrar modal (solo si no se redirige tras enviar) -->
<script>
    function closeModal() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('commentModal'));
        modal.hide();
    }
</script>
@endsection
