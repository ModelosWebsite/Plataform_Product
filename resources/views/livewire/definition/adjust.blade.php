<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="form-group mb-4">
                <h5>Habilitar site</h5>
                <div>
                    <div class="item">
                        <label class="switch">
                            <input type="checkbox" wire:change="updateStatus" {{ $statusSite->status === 'active' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>                
                </div>
            </div>
    
            <div class="form-group">
                <h5>Termos e Politicas</h5>
                <div>
                    <div class="item">
                        <label class="switch">
                            <input type="checkbox" wire:change="termoStatus" {{ isset($this->terms) && $this->terms->accept === 'yes' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>

                        @if (isset($terms) && isset($terms->accept) && $terms->accept === 'yes')

                        @else
                            <div class="mt-2 d-flex">
                                <button data-toggle="modal" data-target="#termsCompany" class=" btn btn-primary bg-white text-primary">Cadastrar meus termos</button> <br>                           
                                <button data-toggle="modal" data-target="#readMyTerms" class=" btn btn-primary bg-white text-primary mx-3" wire:click="loadTerms()">Ler meus termos</button>
                            </div>
                        @endif
                        <br class="mb-3">
                        <button data-toggle="modal" data-target="#read" class="btn btn-primary bg-white text-primary">Ler termos e condições padrão</button> <br>

                        <svg data-toggle="modal" data-target="#exampleModal" style="color: #fff; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>

                        @include("site.create")
                        @include("modals.read")
                        @include("modals.readmyterms") 
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="form-group">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1) Funcionamento do mecanismo de aceitação de termos PB.
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