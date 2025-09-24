<div wire:ignore.self class="modal fade" id="addUser"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h6 class="modal-title mb-0" id="exampleModalLabel">Adicionar Usuário</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <h6 class="form-label">Nome</h6>
            <input class="form-control form-control-sm" type="text" placeholder="Insira o nme do utilizador" wire:model="username">
          </div>

        <div class="form-group">
            <h6 class="form-label">E-mail</h6>
            <input class="form-control form-control-sm" type="text" placeholder="Insira um e-mail" wire:model="useremail">
          </div>
        </div>

        <div class="card-footer">
          <div class="form-group">
            <button wire:click="saveUser" class="btn btn-sm btn-primary">Cadastrar</button>
          </div>
        </div>

      </div>
    </div>
</div>