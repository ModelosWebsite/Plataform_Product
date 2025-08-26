<div>
    <h5>Missão, Visão e Valores</h5>
    @if ($mvv->isNotEmpty() && !$editMode && count($mvv) == 3)
        <div class="container">
            <div class="row">
                @forelse ($mvv as $item)
                    <div class="col-md-12 mb-2">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text text-wrap">{{ $item->description }}</p>
                                <div class="d-flex gap-2 justify-content-lg-end">
                                    <button class="btn btn-primary" wire:click="editService({{ $item->id }})">Editar</button>
                                    <button class="btn btn-danger" wire:click="deleteService({{ $item->id }})">Excluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Nenhum serviço encontrado.</p>
                    </div>
                @endforelse
            </div>
        </div>

    @else
        <!-- Formulário para Cadastrar ou Editar Serviços -->
        <form wire:submit.prevent="{{ $editMode ? 'updateService' : 'storeService' }}">
            <div class="form-group">
                <h5 class="form-label">Titulo</h5>
                <input type="text" class="form-control" wire:model="title" name="title" placeholder="Insira o nome de um serviço...">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <h5 class="form-label">Descrição:</h5>
                <textarea cols="20" wire:model="description" rows="10" class="form-control"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $editMode ? 'Atualizar' : 'Cadastrar' }}</button>
            </div>
        </form>
    @endif
</div>