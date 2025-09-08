<!-- Modal -->
<div wire:ignore.self class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background: var(--background); color:#fff !important;">
          <h5 style="color:#fff !important;" class="modal-title" id="exampleModalLabel">Finalizar Encomenda</h5>
            @if($companyType === "Service")
              <span style="font-size: 25px; cursor: pointer;" data-dismiss="modal" aria-label="Close">
                &times;
              </span>
            @else
              <span style="font-size: 25px; cursor: pointer;" data-bs-dismiss="modal" aria-label="Close">
                &times;
              </span>
            @endif
        </div>
        <div class="modal-body">
          <div>
            <div class="accordion" id="accordionExample">
              @if($package && $package->is_active)
                  <div class="card">
                  <div class="card-header" style="background: var(--background);" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-bs-toggle="collapse" style="color: #fff;" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Pagamento Por Transferência
                      </button>
                    </h2>
                  </div>

                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="card-body">
                      @php  $nameCompany = $bankAccount["Company"]  @endphp
                      @forelse($bankAccount['bankAccounts'] as $bankAccount)
                        <div class="row">
                          <div class="col-6">
                            <h6 class="text-capitalize">Banco: {{ $bankAccount['bank'] }}  |  IBAN: AO06 {{ trim(chunk_split($bankAccount['ibam'], 4, ' ')) ?? ''}}</h6>
                            <h6 class="text-capitalize">Titular: {{ $nameCompany ?? '' }}</h6>
                          </div>
                        <div>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </div>
              @else
                <div class="card">
                  <div class="card-header" style="background: var(--background);" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-bs-toggle="collapse" style="color: #fff;" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pagamento Por Referência
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="card-body">
                      <h6 class="text-capitalize">Entidade: Pacheco Barroso  |  Nº da Entidade: 10181</h6>
                      <h6 class="text-capitalize">Número de Referência: {{ $referenceNumber }}</h6>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>

          <form >
            <div class="mt-2">
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Nome <span class="text-danger">*</span></label>
                  <input type="text" name="name" id="name" class="form-control shadow-none" placeholder="Nome" wire:model="name">
                  @error('email') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">Sobrenome <span class="text-danger">*</span></label>
                  <input type="text" name="lastname" id="lastname" class="form-control shadow-none" placeholder="Sobrenome" wire:model="lastname">
                  @error('lastname') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">Provincia <span class="text-danger">*</span></label>
                  <input type="text" name="province" id="province" class="form-control shadow-none" placeholder="Provincia" wire:model="province">
                  @error('province') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">Município <span class="text-danger">*</span></label>
                  <input type="text" name="municipality" id="municipality" class="form-control shadow-none" placeholder="Município" wire:model="municipality">
                    @error('municipality') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    
                </div>
                <div class="form-group col-md-4">
                  <label for="">Bairro <span class="text-danger">*</span></label>
                  <input type="text" name="street" id="street" class="form-control shadow-none" placeholder="Bairro" wire:model="street">
                  @error('street') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">E-mail <span class="text-danger">*</span></label>
                  <input type="text" name="email" id="email" class="form-control shadow-none" placeholder="E-mail" wire:model="email">
                  @error('email') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">Nº Contribuente <span class="text-danger">*</span></label>
                  <input type="text" min="9" name="nif" id="nif" class="form-control shadow-none" wire:model="taxPayer"> 
                  @error('nifPayer') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="form-group col-md-4">
                  <label for="">Telefone <span class="text-danger">*</span></label>
                  <input type="text" name="phone" id="phone" class="form-control shadow-none" placeholder="999-999-999" wire:model="phone">
                  @error('phone') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    
                </div>
                <div class="form-group col-md-4">
                  <label for="">Telefone Alternativo</label>
                  <input type="text" name="otherPhone" id="otherPhone" class="form-control shadow-none" placeholder="999-999-999" wire:model="otherPhone">
                </div>
                
                <div class="form-group col-md-4">
                  <label for="">Local de Refência <span class="text-danger">*</span></label>
                  <input type="text" name="otherAddress" id="otherAddress" class="form-control shadow-none" placeholder="Digite..." wire:model="otherAddress">
                  @error('otherAddress') <p class="text-danger text-sm mt-1">{{ $message }}</p> @enderror
                  <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                </div>

                @if($paymentType === 'Transferência')
                  <div class="form-group col-md-4 shadow-none">
                    <label for="image">Recibo de Pagamento <span class="text-danger">*</span></label>
                    <input id="receipt" type="file" class="form-control w-100" name="receipt" wire:model="receipt">
                  </div>
                @endif
              </div>
             
              </div>
            </div>
            <h1></h1>
            <div class="modal-footer col-md-12 d-flex justify-content-between align-items-start">
                <h4>Total: {{number_format(abs($totalFinal), 2, '.', ' ')}} Kz</h4>
                <button class="btn btn-primary text-uppercase text-white" type="button" wire:click='checkout("{{ session('companytoken') }}")'
                style="background: var(--background); color:#fff; border: none;">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading wire:target='checkout("{{ session('companytoken') }}")'></span>
                  Encomendar         
                </button>
            </div>
          </form>
      </div>
    </div>
  </div>