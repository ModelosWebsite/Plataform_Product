<div wire:ignore.self class="modal fade" id="addcategory{{ $editMode && isset($category['reference']) ? $category['reference'] : '' }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h6 class="modal-title mb-0" id="exampleModalLabel">{{$editMode ?  "Editar" : "Cadastrar"}} Categoria</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <h6 class="form-label">Categoria</h6>
            <input class="form-control form-control-sm" type="text" placeholder="Insira o nome da categoria" wire:model="description">
          </div>
        </div>

        <div class="card-footer">
          <div class="form-group">
            <button wire:click="createCategory()" class="btn btn-sm btn-primary">Cadastrar</button>
          </div>
        </div>

      </div>
    </div>
</div>