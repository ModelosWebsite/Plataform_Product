<!-- Modal -->
<div class="modal fade" id="helpGoogle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <form>
            <!-- Tipo de Ajuda -->
            <div class="mb-3">
              <label for="tipo" class="form-label">Tipo de ajuda</label>
              <select class="form-control shadow-none" id="tipo" required>
                <option value="">Selecione...</option>
                <option value="tecnica">Ajuda técnica</option>
              </select>
            </div>

            <!-- Mensagem -->
            <div class="mb-3">
              <label for="mensagem" class="form-label">Descreva o seu pedido</label>
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