<div class="modal fade" tabindex="-1" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formConteudo" method="POST" action="#">
                @method("PUT")
            <div class="modal-header">
                <h5 class="modal-title">Editar conteúdo.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    @include('Conteudos.form', compact("playlists"))
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
        </div>
    </div>
</div>
