<div>
    <h4 class="mb-3">Competências</h4>

    <!-- Formulário -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form wire:submit.prevent="habilityCriar" class="row g-3">
                <input type="hidden" wire:model="habilityId">

                <!-- Habilidade -->
                <div class="col-md-6">
                    <p class="form-label fw-bold">Habilidade</p>
                    <input type="text" wire:model="hability" class="form-control" placeholder="Ex: Designer, Contabilista..." required>
                    @error('hability') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <!-- Percentagem -->
                <div class="col-md-6">
                    <p class="form-label fw-bold">Percentagem</p>
                    <input type="number" wire:model="level" class="form-control" placeholder="0 - 100" required min="0" max="100">
                    @error('level') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <!-- Botões -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        {{ $habilityId ? 'Atualizar' : 'Adicionar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista de Habilidades -->
    <div class="row g-4">
        @if (isset($gethability) && count($gethability))
            @foreach ($gethability as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <!-- Cabeçalho -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-title mb-0 fw-bold">{{ $item->hability }}</h6>
                                <span class="badge bg-light text-dark">{{ $item->level }}%</span>
                            </div>

                            <!-- Barra de progresso -->
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" 
                                    style="width: {{ $item->level }}%" 
                                    aria-valuenow="{{ $item->level }}" 
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>

                            <!-- Ações -->
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-sm btn-outline-warning" wire:click="editHability({{ $item->id }})" title="Editar">
                                    <i class="fa fa-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" wire:click="deleteHability({{ $item->id }})" title="Excluir">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center text-muted">
                Nenhuma habilidade cadastrada.
            </div>
        @endif
    </div>
</div>
