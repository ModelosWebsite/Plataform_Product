<div wire:ignore.self class="modal fade" id="markingPaymet" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Cabeçalho -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Pré-Pagamento para marcações</h5>
        <button type="button" class="close d-none" id="closepaymentmarking" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Formulário -->
        <div class="modal-body">
          <!-- Card de Entidade -->
          <div class="card bg-primary text-white mb-4">
            <div class="card-body text-center">
              <p class="mb-1 fw-semibold">Entidade: Pacheco Barroso</p>
              <p class="mb-1 fw-semibold">Nº da Entidade: 10181</p>
              <p class="mb-0 fw-semibold">
                Referência de Pagamento: {{ $referenceCode ?? '' }}
              </p>
            </div>
          </div>

          @if(session('loadPayment'))
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="spinner-border text-primary" role="status" style="width: 5rem; height: 5rem; border-width: .45rem;">
                    <span class="visually-hidden"></span>
                </div>

                <p class="mt-3 mb-0 text-center fw-semibold fs-2">
                    Aguarde enquanto é processado o pagamento
                </p>
            </div>
          @else
            <!-- Nome -->
            <div class="mb-3">
              <label class="form-label">Seu nome / Empresa <span class="text-danger">*</span></label>
              <input type="text" wire:model="full_name" class="form-control shadow-none" placeholder="Seu nome / Empresa">
              @error('full_name')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">E-mail <span class="text-danger">*</span></label>
              <input type="email" wire:model="email" class="form-control shadow-none" placeholder="E-mail">
              @error('email')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <!-- Telefone -->
            <div class="mb-3">
              <label class="form-label">Telefone <span class="text-danger">*</span></label>
              <input type="text" maxlength="9" wire:model="phone" class="form-control shadow-none" placeholder="999999999">
              @error('phone')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <!-- Modalidade de pagamento -->
            <div class="mb-3">
              <label for="option" class="form-label">Modalidade de pagamento <span class="text-danger">*</span></label>
              <select id="option" wire:model.live="methodpayment" class="form-control shadow-none">
                <option selected>Selecione uma forma de pagamento</option>
                <option value="Express">Multicaixa Express</option>
                <option value="Transferencia">Transferência</option>
                <option value="é-Kwnaza">é-Kwanza</option>
                <option value="Unitelmoney">Unitel Money</option>
                <option value="Afrimoney">Afrimoney</option>
              </select>
              @error('option')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>

            <!-- Total -->
            <div class="text-center mb-3">
              <h4 class="fw-bold">Total a Pagar: {{ number_format($appointment->cost,2,'.', ' ') ?? "" }} kz</h4>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-between gap-1">
                <!-- Botão de termos -->
                <div class="btn-termos">
                    <span class="mr-2">Aceito os <a href="#">Termos e condições</a></span>
                    <input type="checkbox" wire:click="acceptTerms" wire:change>
                </div>

                <!-- Botão de finalizar -->
                <button class="btn btn-primary" wire:click="finallyMarking({{ $appointment->id ?? '' }})" @disabled(!$accept)>
                    Finalizar
                </button>

            </div>
            
          @endif
        </div>

      <div class="modal-footer border-0"></div>
    </div>
  </div>
</div>

<style>
    /* Botão azul - Termos */
    .btn-termos {
      background-color: #008ed0;
      color: #fff;
      border: none;
      font-weight: 600;
      text-align: left;
      padding: 12px 18px;
      border-radius: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-termos a {
      color: #fff;
      text-decoration: underline;
      font-weight: 600;
    }

    .btn-termos input[type="checkbox"] {
      width: 22px;
      height: 22px;
      cursor: pointer;
      accent-color: white; /* para navegadores modernos */
    }
</style>