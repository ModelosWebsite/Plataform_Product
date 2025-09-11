<!-- Modal -->
<div class="modal fade" id="helpGoogle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg rounded-3">
                  <div class="card-body p-4">
                    <h4 class="card-title text-center mb-4">📩 Pedido de Ajuda</h4>

                    <form>
                      <!-- Tipo de Ajuda -->
                      <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de ajuda</label>
                        <select class="form-select" id="tipo" required>
                          <option value="">Selecione...</option>
                          <option value="tecnica">Ajuda técnica</option>
                        </select>
                      </div>

                      <!-- Mensagem -->
                      <div class="mb-3">
                        <label for="mensagem" class="form-label">Descreva o seu pedido</label>
                        <textarea class="form-control" id="mensagem" rows="4" placeholder="Explique sua necessidade" required></textarea>
                      </div>

                      <!-- Botão -->
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                          Enviar pedido
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>