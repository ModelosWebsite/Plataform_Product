<div>
    <div class="card">
        <div class="card-header bg-primary text-white mb-3">
            <h6 class="card-title mb-0">Valores da empresa</h6>
        </div>
        <div class="card-body">
            @if ($gethability->isNotEmpty() && !$editMode)
                @foreach ($gethability as $item)
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->title }}</h6>
                                <p class="card-text">{{ $item->description }}%</p>
                                <div class="d-flex gap-2 justify-content-lg-end">
                                    <button class="btn btn-warning btn-sm" wire:click="editHability({{ $item->id }})">Editar</button>
                                    <button class="btn btn-danger btn-sm" wire:click="deleteHability({{ $item->id }})">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <form wire:submit.prevent="habilityCriar">
                    <!-- Campo Oculto para Edição -->
                    <input type="hidden" wire:model="habilityId">

                    <div class="row">
                        <div class="form-group col-6 col-lg-12">
                            <h6 class="form-label">Titulo</h6>
                            <input type="text" wire:model="title" class="form-control form-control-sm" placeholder="Insira a habilidade..." required>
                        </div>

                        <div class="form-group col-6 col-lg-12">
                            <h6 class="form-label">Descrição</h6>
                            <textarea wire:model="description" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-6 col-lg-12">
                        <button type="submit" class="btn btn-primary btn-sm">{{ $habilityId ? 'Atualizar' : 'Adicionar' }}</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>