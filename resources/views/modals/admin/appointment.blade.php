<!-- Appointment Modal -->
<div wire:ignore.self class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold mb-0" id="appointmentModalLabel">Adicionar Marcação</h5>
        <button type="button" class="close close-white" data-dismiss="modal" aria-label="Close">
            <span class="text-white">&times;</span>
        </button>
      </div>

      <form wire:submit="store">
        <div class="modal-body">
          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label">Titulo <span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-none" id="title" wire:model="title" placeholder="Insira o titulo da marcação..">
            @error('title') <span class="text-danger"> {{ $message  }}</span>@enderror
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Descrição breve</label>
            <input type="text" class="form-control shadow-none" id="description" wire:model="description" placeholder="Descreva a macação">
          </div>

          <div class="mb-3">
            <label for="cost" class="form-label">Tipo de marcação</label>
            <select wire:model.live="type" class="form-control shadow-none">
              <option>Escolhe o tipo de marcação</option>
              <option value="paid">Paga pelo cliente</option>
              <option value="free">Gratuita para o cliente</option>
            </select>
          </div>

          <!-- Cost -->
          <div class="mb-3">
              <label for="cost" class="form-label">
                  Custo por marcação <span class="text-danger">*</span>
              </label>

              <input type="number" step="0.01" class="form-control shadow-none" id="cost" wire:model="cost" placeholder="Ex: 1000"@disabled($type === 'free')>

              @error('cost') 
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>



          <!-- HTML Embed -->
          <div class="mb-3">
            <label for="html_embed" class="form-label">HTML de marcação <span class="text-danger">*</span></label>
            <textarea class="form-control shadow-none" id="html_embed" wire:model="html_embed" rows="3" placeholder="<iframe>..."></textarea>
            @error('html_embed') <span class="text-danger"> {{ $message  }}</span>@enderror

          </div>
        </div>

        <div class="modal-footer">
           <button type="submit" class="btn btn-primary">
                <span wire:loading wire:target="store">
                    <i class="spinner-border spinner-border-sm me-1"></i>
                </span>
                Salvar
            </button>
        </div>
      </form>
    </div>
  </div>
</div>
