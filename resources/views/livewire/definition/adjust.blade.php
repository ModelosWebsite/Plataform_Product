<div class="container-fluid">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 rounded">
                <h5 class="mt-3">Termos e Políticas</h5>
                <div class="form-group">
                    <div class="mb-2 text-muted">
                        <i class="fa fa-exclamation-circle"></i> 
                        Sem termos e políticas aceitos ou cadastradas, o seu site não pode ser habilitado.
                    </div>
                    <div class="item">
                        <label class="switch">
                            <input type="checkbox" wire:change="termoStatus" {{ isset($this->terms) && $this->terms->accept === 'yes' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>

                        {{-- Se não aceitou termos, mostrar opções --}}
                        @if (!isset($terms) || $terms->accept !== 'yes')
                            <div class="mt-3 d-flex flex-wrap gap-2">
                                <button data-toggle="modal" data-target="#termsCompany" class="btn btn-outline-primary">
                                    Cadastrar meus termos
                                </button>

                                <button data-toggle="modal" data-target="#readMyTerms" class="btn btn-outline-secondary" wire:click="loadTerms()">
                                    Ler meus termos
                                </button>
                            </div>
                        @endif

                        {{-- Botão termos padrão Pacheco Barroso --}}
                        <div class="mt-3">
                            <a href="https://www.pachecobarroso.com/pb-terms-conditions" target="_blank" class="btn btn-success w-100">
                                Ao aceitar os termos padrão, aceita os termos e condições da Pacheco Barroso
                            </a>
                        </div>

                        <div class="mt-3">
                            <button data-toggle="modal" data-target="#read" class="btn btn-outline-dark w-100">
                                Ler termos e condições padrão
                            </button>
                        </div>
                    </div>
                </div>

                <h5 class="mb-3">Habilitar Website</h5>
                @php
                    $request = request();
                    $token = Str::lower(auth()->user()->company->companyhashtoken);
                    
                    $base = $request->getHost() !== "on.xzero.live"
                    ? $request->getHost()
                    : $request->getHost() . '/' . $token;
                @endphp
                {{-- Exibir link do site habilitado --}}
                @if ($statusSite->status === 'active')
                    <p class="text-success mb-2">
                        Website ativo: 
                        <a href="https://{{ $base }}" target="_blank" class="text-decoration-underline">
                            https://{{ $base }}
                        </a>
                    </p>
                @endif
                {{-- Só habilitar se aceitou os termos --}}
                @if($readMyterms || (isset($terms) && $terms->accept === 'yes'))
                <div class="form-group d-flex align-items-center mb-4">
                    <label class="switchHability">
                        <input type="checkbox" wire:change="updateStatus" {{ $statusSite->status === 'active' ? 'checked' : '' }}>
                        <span class="sliderHability"></span>
                    </label>
                </div>
                @endif

                {{-- Modais --}}
                @include("site.create")
                @include("modals.read")
                @include("modals.readmyterms") 
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="form-group">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1) Funcionamento do mecanismo de aceitação de termos e politicas.
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Quando um usuário acessa o website pela primeira vez ou após uma atualização significativa nos termos e condições, uma janela pop-up, banner ou uma página intermediária é apresentada. Esta interface contém o texto completo dos Termos de Uso e da Política de Privacidade, que deve ser lido e compreendido pelo usuário.</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#politica" aria-expanded="false" aria-controls="collapseTwo">
                                2) Opção de aceitação ou recusa.
                            </h6>
                        </div>
                        <div id="politica" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Dentro dessa interface, o usuário encontrará opções claras para aceitar ou recusar os termos. Normalmente, isso é feito por meio de botões ou checkboxes com legendas como "Aceito os Termos e Condições" e "Não Aceito".</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3) Bloqueio de acesso sem aceitação.
                            </h6>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Se o usuário escolhe não aceitar os termos e condições, o mecanismo impede que ele prossiga para acessar o conteúdo ou serviços do website. Isso é realizado bloqueando a navegação além da página de termos e condições.</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#quetion1" aria-expanded="false" aria-controls="collapseThree">
                                4) Ativação do website com aceitação.
                            </h6>
                        </div>
                        <div id="quetion1" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Se o usuário aceita os termos, o sistema registra essa aceitação. Após essa confirmação, o usuário é redirecionado automaticamente para a página inicial.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>