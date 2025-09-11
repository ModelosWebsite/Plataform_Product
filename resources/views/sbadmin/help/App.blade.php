<!-- Modal -->
<div class="modal fade" id="helpGoogle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h6 class="modal-title mb-0" id="exampleModalLabel">Formulario de Ajuda</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
            <!-- Tipo de Ajuda -->
            <div class="mb-3">
              <h6 for="tipo" class="form-label">Tipo de ajuda</h6>
              <select class="form-control shadow-none" id="tipo" required>
                <option value="">Selecione...</option>
                <option value="tecnica">Ajuda técnica</option>
              </select>
            </div>

            <!-- Mensagem -->
            <div class="mb-3">
              <h6 for="mensagem" class="form-label">Descreva o seu pedido</h6>
              <textarea class="form-control shadow-none" id="mensagem" rows="4" placeholder="Explique sua necessidade" required></textarea>
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