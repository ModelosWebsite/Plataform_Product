<!-- Modal Validação de Conta -->
<div class="modal fade" id="validarContaModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
      <div class="modal-header bg-primary text-white py-3">
        <h5 class="modal-title fw-bold">Validação de Conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p class="text-muted text-center">
          A falta de informação ou insersão de informações imprecisas pode levar à atrasos no processo, bloqueio ou mesmo desativação da sua conta
        </p>

        <div id="validationSteps" role="tablist" class="d-flex justify-content-center align-items-center flex-wrap step-cards nav nav-pills">
          <div class="step-card active completed nav-item" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">
            <div class="step-number">1</div>
            <div class="step-text">Confirmar seus detalhes</div>
          </div>
          <div class="step-card" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab">
            <div class="step-number">2</div>
            <div class="step-text">Documentos</div>
          </div>
          <div class="step-card" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab">
            <div class="step-number">3</div>
            <div class="step-text">Próximos passos</div>
          </div>
        </div>

        <!-- Steps Content -->
        <div class="tab-content" id="validationStepsContent">
          <!-- STEP 1 -->
          <div class="tab-pane fade show active" id="step1" role="tabpanel">
            <form id="formStep1">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label fw-semibold"> É o proprietário da empresa? </label>
                    <select class="form-control">
                      <option value="">selecione</option>
                      <option value="">Sim</option>
                      <option value="">Não</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label class="form-label fw-semibold"> Tem autoridade para vincular empresa? </label>
                      <select class="form-control">
                        <option value="">selecione</option>
                        <option value="">Sim</option>
                        <option value="">Não</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">NIF da empresa</label>
                    <input type="text" class="form-control" placeholder="Ex: 5000000000" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Telefone da empresa</label>
                    <input type="text" class="form-control" placeholder="923 000 000">
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Email da empresa</label>
                    <input type="email" class="form-control" placeholder="exemplo@empresa.ao">
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Descrição dos produtos/serviços</label>
                    <textarea class="form-control" rows="3" placeholder="Descreva os produtos ou serviços"></textarea>
                  </div>
                </div>

                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label fw-semibold">  Seu nome completo como aparece no BI </label>
                    <input type="text" class="form-control shadow-none" placeholder="Escreva o seu nome" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold"> Seu NIF </label>
                    <input type="text" class="form-control shadow-none" placeholder="Ex: 5000000000" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Seu contacto móvel primário</label>
                    <input type="number" class="form-control shadow-none" placeholder="Ex: 920 000 000" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Seu contacto móvel secundário</label>
                    <input type="number" class="form-control shadow-none" placeholder="Ex: 920 000 000" required>
                  </div>

                  <div class="form-group">
                      <label class="form-label fw-semibold"> Em qual dos números tem WhatsApp? </label>
                      <select class="form-control shadow-none">
                        <option value="">selecione</option>
                        <option value="">Primário</option>
                        <option value="">Secundário</option>
                        <option value="">Outro</option>
                        <option value="">Não tenho WhatsApp</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Número do whatsapp</label>
                    <input type="number" class="form-control shadow-none" placeholder="Ex: 920 000 000" required>
                  </div>

                  <div class="form-group">
                    <label class="form-label fw-semibold">Email da pessoal (diferente da empresa)</label>
                    <input type="email" class="form-control shadow-none" placeholder="exemplo@pessoal.ao">
                  </div>
                </div>
              </div>
            </form>
          </div>

          <!-- STEP 2 -->
          <div class="tab-pane fade" id="step2" role="tabpanel">
            <div class="row g-3">
              <div class="col-12 row">
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Certidão da empresa *</label>
                  <input type="file" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Data de emissão</label>
                  <input type="date" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Válido até</label>
                  <input type="date" class="form-control shadow-none">
                </div>
              </div>

              <div class="col-12 row">
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Alvará comercial da empresa *</label>
                  <input type="file" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Data de emissão</label>
                  <input type="date" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Válido até</label>
                  <input type="date" class="form-control shadow-none">
                </div>
              </div>

              <div class="col-12 row">
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Cópia do seu BI *</label>
                  <input type="file" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Data de emissão</label>
                  <input type="date" class="form-control shadow-none">
                </div>
                <div class="col-4 form-group">
                  <label class="form-label fw-semibold">Válido até</label>
                  <input type="date" class="form-control shadow-none">
                </div>
              </div> 

              <div class="col-12 form-group">
                <label class="form-label fw-semibold"> Procuração *</label>
                <input type="file" class="form-control shadow-none">
              </div> 

              <div class="col-12 form-group">
                <label class="form-label fw-semibold"> Foto dos produtos que tenciona comercializar *</label>
                <input type="file" class="form-control shadow-none">
              </div> 

              <div class="col-12 form-group">
                <label class="form-label fw-semibold">  Contrato Assinado *</label>
                <input type="file" class="form-control shadow-none">
              </div> 
              

            </div>
          </div>

          <!-- STEP 3 -->
          <div class="tab-pane fade" id="step3" role="tabpanel">
            <div class="text-center py-4">
              <p class="mb-3 text-left"> 
                Obrigado pela informação fornecida. Para finalizar o processo por favor preça um código de validação (será enviado ao 
                seu e-mail pessoal. 
              </p>
              <p class="mb-3 text-left">Assim que validar o seu processo a nossa equipa irá rever os seus documentos. Se tudo estiver bem iremos activar a sua 
                loja e abilidade de aceder outros produtos vinculativos dentro do nosso ecosistema.</p>
              <p class="mb-3">Um código de validação foi enviado para o seu e-mail. Insira-o abaixo:</p>
                <div class="d-flex justify-content-center align-items-center">
                  <div class="input-group mb-3 col-5">
                    <button class="btn btn-primary" type="button" id="button-addon1">Validar</button>
                    <input type="text" class="form-control shadow-none" placeholder="Insira o código enviado ao email pessoal" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  </div>
                </div>
              <button class="btn btn-primary px-4" id="btn-finalizar-validacao">Finalizar</button>

              <div id="estado-validacao" class="mt-4 d-none">
                <h5 class="fw-bold text-primary mb-2">Processo em análise</h5>
                <p class="text-muted mb-0">
                  A sua documentação foi submetida e está agora <strong>em avaliação</strong> pela equipa.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer d-flex">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Salvar e sair</button>
        <button class="btn btn-primary" id="nextStepBtn">Salvar e continuar</button>
      </div>
    </div>
  </div>
</div>


<style>
.step-cards {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 2rem; /* 👈 Espaçamento horizontal e vertical entre os cards */
  margin: 2rem 0;
}

.step-card {
  display: flex;
  align-items: center;
  gap: 12px;
  background: #999;
  color: #fff;
  padding: 14px 28px;
  border-radius: 8px;
  min-width: 280px;
  justify-content: flex-start;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.step-card .step-number {
  background: #fff;
  color: #000;
  font-weight: 700;
  border-radius: 50%;
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.step-card .step-text {
  font-size: 1rem;
  font-weight: 500;
}

/* Estado ativo/preto */
.step-card.completed {
  background: #006fdd;
}

.step-card:hover {
  transform: translateY(-3px);
  opacity: 0.95;
}
</style>

<!-- JavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const nextBtn = document.getElementById('nextStepBtn');
    const tabButtons = Array.from(document.querySelectorAll('#validationSteps button[data-bs-toggle="pill"]'));
    let currentIndex = 0;

    const goToStep = (index) => {
      const nextTabTrigger = tabButtons[index];
      const tabInstance = new bootstrap.Tab(nextTabTrigger);
      tabInstance.show();
      currentIndex = index;
      updateButton();
    };

    const updateButton = () => {
      if (currentIndex === tabButtons.length - 1) {
        nextBtn.innerText = 'Finalizar';
      } else {
        nextBtn.innerText = 'Salvar e continuar';
      }
    };

    nextBtn.addEventListener('click', () => {
      if (currentIndex < tabButtons.length - 1) {
        goToStep(currentIndex + 1);
      } else {
        document.getElementById('estado-validacao').classList.remove('d-none');
        nextBtn.disabled = true;
        nextBtn.innerText = 'Concluído';
      }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
