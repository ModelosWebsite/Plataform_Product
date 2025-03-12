<div>
    <h4>Valores da empresa</h4>
    @if ($gethability->isNotEmpty() && !$editMode)
        @foreach ($gethability as $item)
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}%</p>
                        <div class="d-flex gap-2 justify-content-lg-end">
                            <button class="btn btn-warning" wire:click="editHability({{ $item->id }})">Editar</button>
                            <button class="btn btn-danger" wire:click="deleteHability({{ $item->id }})">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <form wire:submit.prevent="habilityCriar">
            <!-- Campo Oculto para Edição -->
            <input type="hidden" wire:model="habilityId">

            <div class="form-group">
                <h5 class="form-label">Titulo</h5>
                <input type="text" wire:model="title" class="form-control" placeholder="Insira a habilidade..." required>
            </div>

            <div class="form-group">
                <h5 class="form-label">Descrição</h5>
                <textarea wire:model="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $habilityId ? 'Atualizar' : 'Adicionar' }}</button>
            </div>
        </form>
    @endif
</div>