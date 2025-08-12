<div wire:ignore.self class="modal fade" id="package-details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            @if($selectedPackage)
                <!-- Imagem grande no topo -->
                <div style="height: 300px; background-size: cover; background-position: center;"
                     class="w-100"
                     style="background-image: url('{{ asset('storage/premium/'.$selectedPackage->image) }}');">
                </div>

                <!-- Conteúdo -->
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold mb-0">{{ $selectedPackage->title }}</h3>
                        <span class="badge bg-success fs-6">
                            {{ number_format($selectedPackage->amount, 2, '.', ' ') }} kz
                        </span>
                    </div>
                    <p class="mt-3 text-muted" style="font-size: 15px;">
                        {{ $selectedPackage->description }}
                    </p>

                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary flex-fill"
                                wire:click="generate('{{ $selectedPackage->id }}')">
                            Ativar Agora
                        </button>
                        <button class="btn btn-outline-secondary flex-fill"
                                data-bs-dismiss="modal">
                            Fechar
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>