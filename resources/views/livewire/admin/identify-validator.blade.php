<!-- Modal Validação de Conta -->
<div>
    <div wire:ignore.self class="modal fade" id="validarContaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

                <!-- Cabeçalho -->
                <div class="modal-header bg-primary text-white py-3">
                    <h5 class="modal-title fw-bold">Validação de Conta</h5>
                    <button type="button" class="close close-white" id="close" data-dismiss="modal" aria-label="Fechar">
                        <span class="text-white">&times;</span>
                    </button>
                </div>

                <!-- Corpo -->
                <div class="modal-body">
                    {{-- 
                        <p class="text-muted text-center mb-1">
                            A falta de informação ou inserção de dados incorretos pode causar atrasos, bloqueio ou desativação da sua conta.
                        </p> 
                    --}}
                    <!-- Steps Header -->
                    <div id="validationSteps" role="tablist" class="step-cards">
                        <button class="step-card {{ $step === 1 ? 'active' : '' }}" type="button">
                            <div class="step-number">1</div>
                            <div class="step-text">Confirmar detalhes</div>
                        </button>
                        <button class="step-card {{ $step === 2 ? 'active' : '' }}" type="button">
                            <div class="step-number">2</div>
                            <div class="step-text">Documentos</div>
                        </button>
                        <button class="step-card {{ $step === 3 ? 'active' : '' }}" type="button">
                            <div class="step-number">3</div>
                            <div class="step-text">Próximos passos</div>
                        </button>
                    </div>

                    <!-- Steps Content -->
                    <div class="tab-content mt-4" id="validationStepsContent">
                        <!-- STEP 1 -->
                        <div class="tab-pane fade {{ $step === 1 ? 'show active' : '' }}" id="step1"
                            role="tabpanel">
                            <form id="formStep1">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-semibold">É o proprietário da empresa?<span class="text-danger">*</span></label>
                                            <select class="form-control" wire:model="owner">
                                                <option value="">Selecione</option>
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                            </select>
                                            @error('owner')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Tem autoridade para vincular a
                                                empresa?<span class="text-danger">*</span></label>
                                            <select class="form-control" wire:model="authority">
                                                <option>Selecione</option>
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                            </select>
                                            @error('authority')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">NIF da empresa</label>
                                            <input type="text" class="form-control" disabled
                                                placeholder="{{ auth()->user()->company->companynif }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Telefone</label>
                                            <input type="text" class="form-control" disabled
                                                placeholder="{{ isset(auth()->user()->company->contacts->telefone) ?? '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Email</label>
                                            <input type="email" class="form-control" disabled
                                                placeholder="{{ auth()->user()->company->companyemail }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Localização da empresa</label>
                                            <input type="text" wire:model="notes"
                                                class="form-control shadow-none">
                                            @error('description_products')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Nome completo (como no BI)</label>
                                            <input type="text" wire:model="full_name"
                                                class="form-control shadow-none" placeholder="Escreva o seu nome">
                                            @error('full_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">NIF pessoal</label>
                                            <input type="text" wire:model="nif_personal"
                                                class="form-control shadow-none" placeholder="Ex: 5000000000">
                                            @error('nif_personal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Telefone principal</label>
                                            <input type="number" wire:model="primary_phone"
                                                class="form-control shadow-none" placeholder="Ex: 920000000">
                                            @error('primary_phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Telefone secundário</label>
                                            <input type="number" wire:model="secondary_phone"
                                                class="form-control shadow-none" placeholder="Ex: 920000000">
                                            @error('secondary_phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">WhatsApp</label>
                                            <select class="form-control shadow-none" wire:model.live="whatsapp_option">
                                                <option>Selecione</option>
                                                <option value="Primário">Primário</option>
                                                <option value="Secundário">Secundário</option>
                                                <option value="Outro">Outro</option>
                                                <option value="Não tenho WhatsApp">Não tenho</option>
                                            </select>
                                            @error('whatsapp_option')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        @if ($whatsapp_option == 'Outro')
                                            <div class="form-group">
                                                <label class="form-label fw-semibold">Número do WhatsApp</label>
                                                <input type="number" wire:model="whatsapp_number"
                                                    class="form-control shadow-none" placeholder="Ex: 920000000">
                                                @error('whatsapp_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="form-label fw-semibold">Email pessoal</label>
                                            <input type="email" wire:model="email_personal"
                                                class="form-control shadow-none" placeholder="exemplo@pessoal.ao">
                                            @error('email_personal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- STEP 2 -->
                        <div class="tab-pane fade {{ $step === 2 ? 'show active' : '' }}" id="step2"
                            role="tabpanel">
                            <div class="row g-3">
                                @php
                                    $docs = [
                                        [
                                            'label' => 'Certidão da empresa',
                                            'model' => 'certificate',
                                            'issue' => 'certificate_issue_date',
                                            'expire' => 'certificate_expire_date',
                                        ],
                                        [
                                            'label' => 'Alvará comercial',
                                            'model' => 'business_license',
                                            'issue' => 'business_license_issue_date',
                                            'expire' => 'business_license_expire_date',
                                        ],
                                        [
                                            'label' => 'Cópia do BI',
                                            'model' => 'idCopy',
                                            'issue' => 'idCopy_issue_date',
                                            'expire' => 'idCopy_expire_date',
                                        ],
                                    ];
                                @endphp

                                @foreach ($docs as $d)
                                    <div class="col-12 row">
                                        <div class="col-md-4 form-group">
                                            <label class="form-label fw-semibold">{{ $d['label'] }} <span class="text-danger">*</span></label>
                                            <input type="file" wire:model="{{ $d['model'] }}"
                                                class="form-control shadow-none">
                                            @error($d['model'])
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="form-label fw-semibold">Data de emissão <span class="text-danger">*</span></label>
                                            <input type="date" wire:model="{{ $d['issue'] }}"
                                                class="form-control shadow-none">
                                            @error($d['issue'])
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="form-label fw-semibold">Válido até <span class="text-danger">*</span></label>
                                            <input type="date" wire:model="{{ $d['expire'] }}"
                                                class="form-control shadow-none">
                                            @error($d['expire'])
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 form-group">
                                    <label class="form-label fw-semibold">Cópia do BI dos proprietários <span class="text-danger">*</span></label>
                                    <input type="file" wire:model="owners_id_copies"
                                        class="form-control shadow-none" multiple>
                                    @error('owners_id_copies')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label fw-semibold"> Procuração que lhe da poderes para vincular a empresa</label>
                                    <input type="file" wire:model="procuration" class="form-control shadow-none">
                                    @error('procuration')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label fw-semibold">Foto dos produtos que tenciona comercializar</label>
                                    <input type="file" wire:model="product_photos"
                                        class="form-control shadow-none" multiple>
                                    @error('product_photos')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label fw-semibold">Contrato assinado</label>
                                    <input type="file" wire:model="contract" class="form-control shadow-none">
                                    @error('contract')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="tab-pane fade {{ $step === 3 ? 'show active' : '' }}" id="step3"
                            role="tabpanel">
                            <div class="text-center py-4">
                                <p class="text-start">
                                    Obrigado pela informação fornecida. Para finalizar o processo por favor preça um
                                    código de validação (será enviado ao
                                    seu <strong>email pessoal</strong>.
                                </p>
                                <p class="text-start">
                                    Assim que validar o seu processo a nossa equipa irá rever os seus documentos. Se
                                    tudo estiver bem iremos activar a sua
                                    loja e abilidade de aceder outros produtos vinculativos dentro do nosso ecosistema.
                                </p>
                                <div class="input-group my-4 mx-auto" style="max-width: 420px;">
                                    <input type="text" class="form-control shadow-none" wire:model="codeSend" placeholder="Insira o código de validação">
                                    <button class="btn btn-primary" wire:click="validateCode">
                                        <span wire:loading wire:target="validateCode">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                                aria-hidden="true"></span>
                                        </span>
                                      Validar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rodapé -->
                <div class="modal-footer d-flex justify-content-between bg-light">
                    <button class="btn btn-outline-secondary" wire:click="previousStep" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="previousStep">
                            <i class="bi bi-arrow-left"></i> Voltar
                        </span>
                        <span wire:loading wire:target="previousStep">
                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                aria-hidden="true"></span>
                            Voltando...
                        </span>
                    </button>

                    <button class="btn btn-primary" wire:click="nextStep" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="nextStep">
                            Salvar e Continuar <i class="bi bi-arrow-right"></i>
                        </span>
                        <span wire:loading wire:target="nextStep">
                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                aria-hidden="true"></span>
                            Salvando...
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>

    <style>
        /* Step Cards fixos */
        #validationSteps {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fff;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        .step-cards {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.2rem;

        }

        .step-card {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #dee2e6;
            color: #333;
            padding: 12px 24px;
            border-radius: 10px;
            border: 2px solid transparent;
            min-width: 200px;
            justify-content: flex-start;
            transition: all 0.3s ease;
        }

        .step-card.active,
        .step-card:hover {
            background: #006fdd;
            color: #fff;
            transform: translateY(-2px);
        }

        .step-number {
            background: #fff;
            color: #006fdd;
            font-weight: 700;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .step-card.active .step-number {
            background: #fff;
            color: #006fdd;
        }

        .form-group label {
            margin-bottom: 4px;
        }

        .form-control {
            border-radius: 8px;
        }

        .modal-content {
            border-radius: 1rem;
            overflow: hidden;
        }
    </style>
</div>

<script>
    document.addEventListener('close-valid', (event)=> {
        $("#close").trigger('click')
    })
</script>