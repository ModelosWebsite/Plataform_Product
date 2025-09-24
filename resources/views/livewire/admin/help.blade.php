<div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="helpXzero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h6 class="modal-title mb-0" id="exampleModalLabel">Formulario de Ajuda</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="saveHelp">
            <!-- Tipo de Ajuda -->
            <div class="mb-3">
              <h6 for="tipo" class="form-label">Tipo de ajuda</h6>
              <select wire:model="typehelp" class="form-control shadow-none" id="tipo" required>
                <option value="">Selecione...</option>
                @forelse ($categories as $category)
                    <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                @empty
                    
                @endforelse
              </select>
            </div>

            <!-- Mensagem -->
            <div class="mb-3">
              <h6 for="mensagem" class="form-label">Descreva o seu pedido</h6>
              <textarea wire:model="message" class="form-control shadow-none" id="mensagem" rows="6" placeholder="Explique sua necessidade" required></textarea>
            </div>

            <!-- Botão -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">
                Enviar pedido
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>
{{-- End Import Component livewire loja online --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />