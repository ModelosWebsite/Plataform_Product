<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">Configuração do Serviço</h6>
        </div>
        <div class="card-body">
            <!-- Formulário para Cadastrar ou Editar Serviços -->
            <form wire:submit.prevent="{{ $editMode ? 'updateService' : 'storeService' }}">
                <div class="form-group">
                    <h6 class="form-label">Nome do serviço</h6>
                    <input type="text" class="form-control shadow-none" wire:model="title" name="title" placeholder="Insira o nome de um serviço...">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <h6 class="form-label">Descrição:</h6>
                    <input type="text" class="form-control shadow-none" wire:model="description" name="description" placeholder="Descreva o seu serviço...">
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
                                    <h6 class="card-title">{{ $item->title }}</h6>
                                    <p class="card-text">{{ $item->description }}</p>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary me-2" wire:click="editService({{ $item->id }})">
                                        Editar
                                    </button>
                                    <button class="btn btn-danger" wire:click="deleteService({{ $item->id }})">
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
    </div>
</div>