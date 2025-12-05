<div wire:ignore.self class="modal fade" id="addomain" tabindex="-1" aria-hidden="true" x-data="{ first: false, second: false }">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow-lg">

            <button type="button" class="close d-none"  id="closedomain" data-dismiss="modal" aria-label="Close">
                <span>&times;</span>
            </button>
            
            <!-- Cabeçalho com ícone -->
            <div class="bg-light p-4 border-bottom">
                <div class="row align-items-center">
                    <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                        <i class="fa fa-globe fa-8x text-primary"></i>
                    </div>
                    <div class="col-12 col-md-8">
                        <h3 class="fw-bold">Dóminio Personalizado</h3>
                        <p class="text-muted mb-0" style="font-size: 15px;">
                            Conecte o seu próprio domínio e fortaleça a identidade da sua marca.
                            Ao ativar este recurso, o seu site deixa de usar o endereço
                            <strong>seusite.on.xzero.live</strong> e passa a funcionar com o seu domínio próprio (ex:
                            <strong>www.seusite.com</strong>).
                        </p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="p-4">
                <div wire:ignore.self class="row g-3" id="domainForms">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-outline-primary w-100 fw-semibold py-2" type="button"
                            @click="first = !first">
                            Pacote Independente
                        </button>
                    </div>

                    <div class="col-12 col-md-6">
                        <button class="btn btn-outline-primary w-100 fw-semibold py-2" type="button"
                            @click="second = !second">
                            Pacote VIP
                        </button>
                    </div>

                    <!-- Formulário: Pacote Independente -->
                    <div class="col-12">
                        <div x-show="first" class="mt-3">
                            <div class="card border-0 rounded-4">
                                <div class="card-body">
                                    <p class="text-muted">
                                        Neste pacote você a gestão do processo na sua totalidade desde a compra e
                                        registo do domínio com o registrar da sua escolha os pagamentos das cotações
                                        anuais de renovação e segurança e a inserção dos dados do domínio no nosso
                                        sistema e no sistema do registrar.
                                    </p>

                                    <div class="mb-3">
                                        <p class="badge bg-success text-white h2 px-3 py-2">
                                            {{ number_format(25000, 2, '.', ' ') }} kz
                                        </p>
                                        <small class="ms-1">por mês</small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="domain" class="form-label fw-semibold">Adicione aqui um domínio
                                            seu que já comprou</label>
                                        <input type="text" id="domain" wire:model="domain"
                                            class="form-control shadow-none" placeholder="exemplo.com">
                                        @error('domain')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <button wire:click="camePayment('Independent')" wire:loading.attr="disabled"
                                        wire:target="camePayment"
                                        class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                        <span wire:loading.remove wire:target="camePayment">
                                            <i class="fa fa-save me-2"></i> Salvar
                                        </span>
                                        <span wire:loading wire:target="camePayment">
                                            <i class="spinner-border spinner-border-sm me-2"></i> Processando...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulário: Pacote VIP -->
                    <div class="col-12">
                        <div class="mt-3" x-show="second">
                            <div class="card border-0 rounded-4">
                                <div class="card-body">
                                    <p class="text-muted">
                                        Neste pacote um membro dedicado da nossa equipe ira ajudar
                                        você na gestão do processo total desde a compra e registo do
                                        domínio com o registrar da sua escolha, o monitoramento dos
                                        períodos de pagamentos das cotações anuais de renovação e segurança
                                        e a inserção dos dados do domínio no nosso sistema e no sistema do registrar.
                                        <strong>Este pacote não inclui os pagamentos que tem que ser feitos a outras
                                            entidades para aquisição e registro do domínio</strong>
                                    </p>

                                    <div class="mb-3">
                                        <p class="badge bg-success text-white h3 px-3 py-2">
                                            {{ number_format(45000, 2, '.', ' ') }} kz
                                        </p>
                                        <small class="text-muted ms-1">mensal</small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="new_domain" class="form-label fw-semibold">Nome do Domínio</label>
                                        <input wire:model="domainName" type="text" id="new_domain"
                                            class="form-control shadow-none"
                                            placeholder="Escreva aqui as opções do nome do dóminio">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="ext_domain" class="form-label fw-semibold">Extensão</label>
                                        <select id="ext_domain" class="form-control shadow-none" wire:model="extension">
                                            <option value="">Selecione a extensão</option>
                                            @php
                                                $extensions = [
                                                    '.ao',
                                                    '.co.ao',
                                                    '.gov.ao',
                                                    '.edu.ao',
                                                    '.org.ao',
                                                    '.it.ao',
                                                ];
                                            @endphp
                                            @foreach ($extensions as $ext)
                                                <option value="{{ $ext }}">{{ $ext }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button wire:click="camePayment('vip')" wire:loading.attr="disabled"
                                        class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                        <span wire:loading.remove wire:target="camePayment">
                                            <i class="fa fa-save me-2"></i> Salvar
                                        </span>
                                        <span wire:loading wire:target="camePayment">
                                            <i class="spinner-border spinner-border-sm me-2"></i> Processando...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>