<div wire:ignore.self class="modal fade" id="addomain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="exampleModalLabel">Dominio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <h5 for="" class="form-label">Dominio</h5>
            <input class="form-control shadow-none" type="text" placeholder="Seu dominio.com/ao" wire:model="domain">
            @error('domain') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          
        </div>

        <div class="card-footer">
          <div class="form-group">
            <button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="btn btn-primary">
                <span wire:loading.remove wire:target="save">
                    <i class="fa fa-save me-1"></i> Cadastrar
                </span>
                <span wire:loading wire:target="save">
                    <i class="spinner-border spinner-border-sm me-1"></i> Salvando ...
                </span>
            </button>
          </div>
        </div>

      </div>
    </div>
</div>