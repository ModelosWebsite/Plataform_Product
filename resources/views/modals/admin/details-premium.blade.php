<div wire:ignore.self class="modal fade" id="package-details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            @if($selectedPackage)
                <!-- Imagem grande no topo -->
                <div style="height: 300px;" class="w-100">
                    <div class="col-12 row">
                        <div class="col-4">
                            <img class="mt-5" src="{{ asset('storage/premium/'.$selectedPackage->image) }}" class="package-img">
                        </div>
                        <div class="col-8">
                            <h3 class="fw-bold mt-5">{{ $selectedPackage->title }}</h3>
                            <p class="text-muted" style="font-size: 15px;">
                                {{ $selectedPackage->description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo -->
                <div class="p-4">
                    <div class="align-items-center">
                        <span>Preço à pagar: </span>
                        <span class="badge bg-success fs-6">
                             {{ number_format($selectedPackage->amount, 2, '.', ' ') }} kz
                        </span>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button class="btn btn-primary flex-fill"
                                wire:click="generate('{{ $selectedPackage->id }}')">
                            Ativar Agora
                        </button>
                        <button class="btn btn-outline-secondary flex-fill"
                                data-dismiss="modal">
                            Fechar
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>