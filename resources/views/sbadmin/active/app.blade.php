<div class="row col-md-12">

    <!-- Card Website -->
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm p-4 rounded-4 small-box 
            {{ auth()->user()->company->status == 'active' ? 'bg-gradient-success' : 'bg-gradient-danger' }} text-white">

            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-globe fa-2x bg-opacity-25 p-2 rounded-circle fs-1"></i>
                </div>
                <div class="flex-grow-1">
                    <a href="{{ route('definition.general') }}" class="stretched-link text-white text-decoration-none">
                        @if (auth()->user()->company->status == "active")
                            <h6 class="fw-bold mb-0">O seu website está ativo</h6>
                            <small>Clique para desativá-lo</small>
                        @else
                            <h6 class="fw-bold mb-0">O seu website está inativo</h6>
                            <small>Clique para ativá-lo</small>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Loja -->
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm p-4 rounded-4 small-box 
            {{ auth()->user()->company->status == 'active' ? 'bg-gradient-primary' : 'bg-gradient-danger' }} text-white">

            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-store fa-2x bg-opacity-25 p-2 rounded-circle fs-1"></i>
                </div>
                <div class="flex-grow-1">
                    <a href="{{ route('admin.general.shopping') }}" class="stretched-link text-white text-decoration-none">
                        @if (auth()->user()->company->status == "active")
                            <h6 class="fw-bold mb-0">A sua loja está disponível</h6>
                            <small>Acesse a sua loja clicando aqui</small>
                        @else
                            <h6 class="fw-bold mb-0">A sua loja está inativa</h6>
                            <small>Será ativada com o website</small>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card xZero -->
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm p-4 rounded-4 small-box 
            {{ auth()->user()->company->status == 'active' ? 'bg-gradient-info' : 'bg-gradient-danger' }} text-white">

            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-file-invoice fa-2x bg-opacity-25 p-2 rounded-circle fs-1"></i>
                </div>
                <div class="flex-grow-1">
                    <a href="https://www.xzero.live/login" target="_blank" class="stretched-link text-white text-decoration-none">
                        @if (auth()->user()->company->status == "active")
                            <h6 class="fw-bold mb-0">xZero disponível</h6>
                            <small>Já pode emitir as facturas</small>
                        @else
                            <h6 class="fw-bold mb-0">xZero indisponível</h6>
                            <small>Será ativado com o website</small>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Estilo extra -->
<style>
    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745, #218838);
    }
    .bg-gradient-danger {
        background: linear-gradient(135deg, #dc3545, #c82333);
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
    }
    .bg-gradient-info {
        background: linear-gradient(135deg, #17a2b8, #117a8b);
    }
</style>
