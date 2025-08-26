<div>
    <h3>Serviços</h3>
    <!-- Formulário para Cadastrar ou Editar Serviços -->
    <form wire:submit.prevent="{{ $editMode ? 'updateService' : 'storeService' }}">
        <div class="form-group">
            <h5 class="form-label">Nome do serviço</h5>
            <input type="text" class="form-control" wire:model="title" name="title" placeholder="Insira o nome de um serviço...">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <h5 class="form-label">Descrição:</h5>
            <input type="text" class="form-control" wire:model="description" name="description" placeholder="Descreva o seu serviço...">
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $editMode ? 'Atualizar' : 'Cadastrar' }}</button>
            <a class="btn btn-primary mx-2" onclick="openTab(event, 'components')"> Proximo </a>
        </div>
    </form>
    <!-- Listagem de Serviços -->
    <hr>
    <!-- Cards de Serviços com Bootstrap -->
    <div class="row">
        @forelse ($getService as $item)
            <div class="col-md-5 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button 
                                class="btn btn-primary w-50 me-2"
                                wire:click="editService({{ $item->id }})">
                                Editar
                            </button>
                            <button 
                                class="btn btn-danger w-50"
                                wire:click="deleteService({{ $item->id }})">
                                Excluir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                Nenhum serviço encontrado
            </div>
        @endforelse
    </div>

</div>
