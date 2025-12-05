<div class="container-fluid py-3" wire:poll.200ms="checkPayment">
    <div class="card border-0 shadow-sm">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-0 pb-0">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-globe2 me-2"></i> Domínios Personalizados
            </h5>
            <button class="btn btn-primary btn-sm d-flex align-items-center" data-toggle="modal" data-target="#addomain">
                <i class="bi bi-plus-lg me-1"></i> Adicionar Domínio
            </button>
        </div>

        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Domínio</th>
                            <th>Status</th>
                            <th>Verificação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($domains as $domain)
                            <tr>
                                <td class="fw-semibold">{{ $domain->domain ?? '' }}</td>
                                <td>
                                    @if ($domain->verified)
                                        <span class="badge bg-success px-3 py-2 text-white">
                                            <i class="fa fa-shield-check me-1"></i> Verificado
                                        </span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2 text-white">
                                            <i class="fa fa-exclamation-triangle me-1"></i> Não vinculado
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($domain->verified)
                                        <small class="text-muted">
                                            <i class="fa fa-info-circle me-1"></i> Domínio ativo e verificado.
                                        </small>
                                    @else
                                        <div class="alert alert-warning py-1 small mb-2" role="alert">
                                            ⚠️ Antes de clicar em <strong>Verificar</strong>, siga as instruções.
                                            <button class="btn btn-outline-secondary btn-sm" type="button"
                                                data-toggle="collapse" data-target="#instructions-{{ $domain->id }}"
                                                aria-expanded="false">
                                                <i class="fa fa-gear me-1"></i> Instruções
                                            </button>
                                        </div>
                                        <div class="collapse mt-2" id="instructions-{{ $domain->id }}">
                                            <div class="card card-body bg-light border-0 small">
                                                <p class="mb-1">
                                                    Para verificar seu domínio
                                                    <strong>{{ $domain->domain }}</strong>, adicione um registro
                                                    <strong>CNAME</strong> no seu cPanel:
                                                </p>
                                                <div class="bg-light p-3 rounded">

                                                    <div class="mb-3 border-start border-primary ps-3">
                                                        <p class="mb-1 fw-semibold">Registo CNAME:</p>
                                                        <ul class="list-unstyled mb-2 ms-3">
                                                            <li><strong>Tipo:</strong> CNAME</li>
                                                            <li><strong>Nome:</strong> www</li>
                                                            <li><strong>Valor:</strong>
                                                                {{ $domain->verification_token ?? 'seu_token' }}.{{ env('APP_URL') }}
                                                            </li>
                                                        </ul>
                                                        <button class="btn btn-outline-primary btn-sm copy-btn"
                                                            data-copy="_on.{{ Str::before($domain->domain, '.') }} → {{ $domain->verification_token ?? 'seu_token' }}.port.fortcodedev.com">
                                                            Copiar CNAME
                                                        </button>
                                                    </div>

                                                    <div class="border-start border-success ps-3">
                                                        <p class="mb-1 fw-semibold">Registo A (IP):</p>
                                                        <ul class="list-unstyled mb-2 ms-3">
                                                            <li><strong>Tipo:</strong> A</li>
                                                            <li><strong>Nome:</strong> @</li>
                                                            <li><strong>Valor:</strong>
                                                                {{ gethostbyname(env('APP_URL') ?? '') }}</li>
                                                        </ul>
                                                        <button class="btn btn-outline-success btn-sm copy-btn"
                                                            data-copy="on={{ $domain->verification_token ?? 'seu_token' }}">
                                                            Copiar A
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center d-flex">
                                    <button wire:click="verify({{ $domain->id }})" wire:loading.attr="disabled"
                                        wire:target="verify({{ $domain->id }})"
                                        class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center">
                                        <span wire:loading.remove wire:target="verify({{ $domain->id }})">
                                            <i class="fa fa-search me-1"></i> Verificar
                                        </span>
                                        <span wire:loading wire:target="verify({{ $domain->id }})">
                                            <i class="spinner-border spinner-border-sm me-1"></i>
                                        </span>
                                    </button>

                                    <button wire:click="deleteDomain({{ $domain->id }})" wire:loading.attr="disabled"
                                        wire:target="deleteDomain({{ $domain->id }})"
                                        class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center">
                                        <span wire:loading.remove wire:target="deleteDomain({{ $domain->id }})">
                                            <i class="fa fa-trash me-1"></i>
                                        </span>
                                        <span wire:loading wire:target="deleteDomain({{ $domain->id }})">
                                            <i class="spinner-border spinner-border-sm me-1"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="12">
                                    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 30vh;">
                                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                                        <h6 class="fw-normal">Nenhum domínio cadastrado</h6>
                                        <button class="btn btn-primary btn-sm mt-3" data-toggle="modal"
                                            data-target="#addomain">
                                            <i class="fa fa-plus-lg me-1"></i> Adicionar Agora
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Start --}}
    @include('modals.domain')
    @include('modals.premium')


    {{-- Modal End --}}
</div>


<script>
    document.querySelectorAll('.copy-btn').forEach(button => {
        button.addEventListener('click', () => {
            const text = button.getAttribute('data-copy');
            navigator.clipboard.writeText(text).then(() => {
                button.textContent = '✅ Copiado!';
                setTimeout(() => {
                    button.textContent = button.classList.contains(
                            'btn-outline-primary') ?
                        'Copiar CNAME' :
                        'Copiar A';
                }, 2000);
            });
        });
    });

    document.addEventListener('close-modals', (event)=> {
        $("#closepremium").trigger('click')
        $("#closedomain").trigger('click')
    })
</script>

<script>
    window.addEventListener('openModal', event => {
        $('#modalPayment').modal('show');
    });
</script>
