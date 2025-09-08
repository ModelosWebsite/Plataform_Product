<div wire:ignore>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card mb-4">
                    
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <main>
                                <input id="tab2" type="radio" name="tabs" checked>
                                <label for="tab2">Temas</label>

                                <input id="tab1" type="radio" name="tabs">
                                <label for="tab1">Conteúdo</label>
                         
                                <input id="tab3" type="radio" name="tabs">
                                <label for="tab3">Fotos</label>

                                <input id="tab6" type="radio" name="tabs">
                                <label for="tab6">Pagamento/Entrega</label>
                                    
                                <input id="tab4" type="radio" name="tabs">
                                <label for="tab4">Habilitar Website</label>
                                
                                <input id="tab5" type="radio" name="tabs">
                                <label for="tab5">Minha Conta</label>

                                <section id="content1">@livewire("definition.support")</section>
                                <section id="content2">@livewire("definition.color") </section>
                                <section id="content3">@livewire("definition.background")</section>
                                <section id="content4">@livewire("definition.adjust")</section>
                                <section id="content5">@livewire("definition.my-account")</section>
                                <section id="content6"><livewire:admin.config-payment></section>
                            </main>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset("css/definition.css")}}">

        <div class="modal fade" id="infoXzero" tabindex="-1" aria-labelledby="infoXzeroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="infoXzeroLabel">
            <i class="bi bi-exclamation-circle me-2"></i> Atenção!
            </h5>
            <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
            <p class="mb-3">
            Para garantir que sua loja funcione corretamente, é obrigatório preencher os seguintes dados no portal <strong>xZero</strong>:
            </p>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><i class="bi bi-percent me-2 text-primary"></i> IVA</li>
                <li class="list-group-item"><i class="bi bi-file-earmark-text me-2 text-primary"></i> Regime Fiscal</li>
                <li class="list-group-item"><i class="bi bi-file-earmark-text me-2 text-primary"></i> IBAN (Conta Bancária)</li>
            </ul>
            <p class="text-muted">
            ⚠️ Sem essas informações, a loja não poderá processar corretamente os pagamentos.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
            <a href="https://www.xzero.live/login" target="_blank" class="btn btn-primary">
                <i class="bi bi-pencil-square me-1"></i> Preencher Dados
            </a>
        </div>
        </div>
    </div>
    </div>

    <!-- Script para abrir a modal automaticamente -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var myModal = new bootstrap.Modal(document.getElementById('infoXzero'));
        myModal.show();
    });
    </script>
</div>