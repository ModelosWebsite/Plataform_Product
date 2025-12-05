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

    @php
        $status = $shoppingValid['status'] ?? null;

        // Mapear cores
        $colors = [
            'validated' => 'bg-gradient-primary',
            'pending'   => 'bg-gradient-warning',
            'review'    => 'bg-gradient-info',
            'rejected'  => 'bg-gradient-danger',
            null        => 'bg-gradient-danger', // null = bloqueado
        ];

        // Condições de acesso
        $canAccess = $status === 'validated';  // só validated libera
        $openModal = is_null($status);         // null → abre modal
    @endphp

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm p-4 rounded-4 small-box
            {{ $colors[$status] }} text-white"
            style="{{ !$canAccess ? 'pointer-events: none; opacity: 0.6;' : '' }}">

            <div class="d-flex align-items-center">
                <div class="me-3">
                    @if(!$canAccess)
                        <i class="fas fa-lock fa-2x bg-opacity-25 p-2 rounded-circle fs-1"></i>
                    @else
                        <i class="fas fa-store fa-2x bg-opacity-25 p-2 rounded-circle fs-1"></i>
                    @endif
                </div>

                <div class="flex-grow-1">
                    <a href="{{ $canAccess ? route('admin.general.shopping') : '#' }}"
                        {{ $openModal ? 'data-toggle=modal data-target=#validarContaModal' : '' }}
                        class="stretched-link text-white text-decoration-none">

                        {{-- Mensagens por estado --}}
                        @if($status === 'validated')
                            <h6 class="fw-bold mb-0">A sua loja está disponível</h6>
                            <small>Acesse a sua loja clicando aqui</small>

                        @elseif(is_null($status))
                            <h6 class="fw-bold mb-0">Ativar loja — Verifique a sua conta</h6>
                            <small>Para usar a loja valide a sua identidade</small>

                        @elseif($status === 'pending')
                            <h6 class="fw-bold mb-0">Conta em análise inicial</h6>
                            <small>Aguardando verificação</small>

                        @elseif($status === 'review')
                            <h6 class="fw-bold mb-0">Documentos em revisão</h6>
                            <small>O processo pode demorar 72h úteis</small>

                        @elseif($status === 'rejected')
                            <h6 class="fw-bold mb-0">Documentos recusados</h6>
                            <small>Envie novos documentos para ativar a loja</small>
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
