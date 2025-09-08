<div>
    <link rel="stylesheet" href="{{asset("css/definition.css")}}">
    <link rel="stylesheet" href="{{asset("css/table.css")}}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card mb-4">
                    
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            
                            <main>
                                <input id="tab1" type="radio" name="tabs" checked>
                                <label for="tab1"> Categorias </label>
                                    
                                <input id="tab2" type="radio" name="tabs">
                                <label for="tab2"> Itens </label>
                                    
                                <input id="tab3" type="radio" name="tabs">
                                <label for="tab3">Controle de Encomenda</label>
                                    
                                <section id="content2">@livewire("admin.itens") </section>
                                <section id="content1">@livewire("admin.category")</section>
                                <section id="content3">@livewire("admin.encomenda")</section>
                            </main>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Informações -->
    <div class="modal fade" id="infoPagamentoModal" tabindex="-1" aria-labelledby="infoPagamentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="infoPagamentoLabel">
            <i class="bi bi-exclamation-circle me-2"></i> Atenção!
            </h5>
            <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
            <p class="mb-3">
            Para garantir que sua loja funcione corretamente, é obrigatório preencher os seguintes dados no portal <strong>Kytutes</strong>:
            </p>
            <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item"><i class="bi bi-file-earmark-text me-2 text-primary"></i> Regime Fiscal</li>
            <li class="list-group-item"><i class="bi bi-percent me-2 text-primary"></i> IVA</li>
            </ul>
            <p class="text-muted">
            ⚠️ Sem essas informações, a loja não poderá processar corretamente as entregas.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
            <a href="https://kytutes.com/auth/login" target="_blank" class="btn btn-primary">
                <i class="bi bi-pencil-square me-1"></i> Preencher Dados
            </a>
        </div>
        </div>
    </div>
    </div>

    <!-- Script para abrir a modal automaticamente -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var myModal = new bootstrap.Modal(document.getElementById('infoPagamentoModal'));
        myModal.show();
    });
    </script>

</div>