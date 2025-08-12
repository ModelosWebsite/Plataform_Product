<div wire:ignore.self class="modal fade" id="addElement"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="exampleModalLabel">{{$editMode ?  "Editar" : "Cadastrar"}} Elemento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <h5 for="image" class="form-label">Imagem</h5>
                <input class="form-control" type="file" wire:model="image">
            </div>

            <div class="form-group">
                <h5 for="" class="form-label">Nome</h5>
                <input class="form-control" type="text" placeholder="Insira o nome do elemento" wire:model="title">
            </div>

            <div class="form-group">
                <h5 for="" class="form-label">Descrição</h5>
                <textarea class="form-control" wire:model="description"></textarea>
            </div>

            <div class="form-group">
                <h5 for="" class="form-label">Preço</h5>
                <input class="form-control" type="number" placeholder="Insira o preço" wire:model="price">
            </div>
        </div>

        <div class="card-footer">
          <div class="form-group">
            <button wire:click="saveFunctionality" class="btn btn-primary">
                {{ $editMode ? 'Atualizar' : 'Cadastrar' }}
            </button>
          </div>
        </div>

      </div>
    </div>
</div>