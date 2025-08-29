<div>
    <h3>Competências</h3>
    <hr>

    <form wire:submit.prevent="habilityCriar">
        <!-- Campo Oculto para Edição -->
        <input type="hidden" wire:model="habilityId">

        <div class="form-group">
            <h5 class="form-label">Habilidade</h5>
            <input type="text" wire:model="hability" class="form-control" placeholder="Insira a habilidade..." required>
            @error('hability') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <h5 class="form-label">Percentagem</h5>
            <input type="number" wire:model="level" name="level" class="form-control" placeholder="Insira o número correspondente..." required min="0" max="100">
            @error('level') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $habilityId ? 'Atualizar' : 'Adicionar' }}</button>
            <button class="btn btn-primary mx-3" onclick="openTab(event, 'about')"> Proximo </button>
        </div>
    </form>

    <hr>
    
    <!-- Cards de Habilidades com Bootstrap -->
    <div class="row">
        @if (isset($gethability) && count($gethability))
            @foreach ($gethability as $item)
                <div class="col-md-5 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-between">
                            <h5 class="card-title">{{ $item->hability }}</h5>
                            <p class="card-text">Nível: {{ $item->level }}%</p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $item->level }}%" aria-valuenow="{{ $item->level }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto">
                                <button class="btn btn-warning w-50 me-2" wire:click="editHability({{ $item->id }})">Editar</button>
                                <button class="btn btn-danger w-50" wire:click="deleteHability({{ $item->id }})">Excluir</button>
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