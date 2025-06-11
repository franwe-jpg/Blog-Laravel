<!-- Modal para editar comentario -->
<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('comment.update', $comment) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editCommentModalLabel">Editar Comentario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <div class="mb-3">

            <div class="mb-3">
                <label class="form-label">Título:</label>
                <input type="text" name="title" class="form-control" value="{{old('title', $comment->title) }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea name="content" id="editCommentContent" class="form-control" rows="4" >{{ old('content', $comment->content)}}</textarea>
            </div>

          </div>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

