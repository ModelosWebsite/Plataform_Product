<div class="container">
    <h3 class="mb-3">Sobre a empresa</h3>
    @if($getAbout->isNotEmpty() && !$editMode)
        <div class="row">
            @foreach ($getAbout as $item)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body">
                            <h5 class="card-title">Descrição:</h5>
                            <p class="card-text text-muted">{{ $item->p1 }}</p>
                            
                            <h5 class="card-title">Descrição 1:</h5>
                            <p class="card-text text-muted">{{ $item->p2 }}</p>
                            
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button class="btn btn-outline-primary" wire:click="editAbout({{ $item->id }})">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button class="btn btn-outline-danger" wire:click="deleteAbout({{ $item->id }})">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card shadow-sm border-0 rounded p-4">
            <form wire:submit.prevent="{{ $editMode ? 'updateAbout' : 'storeAbout' }}">
                <div class="mb-3">
                    <span class="form-label">Descrição:</span>
                    <textarea name="p1" wire:model="p1" class="form-control" rows="4" placeholder="Insira uma breve descrição..."></textarea>
                    @error('p1') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                
                <div class="mb-3">
                    <span class="form-label">Descrição 1:</span>
                    <textarea name="p2" wire:model="p2" class="form-control" rows="4" placeholder="Insira uma segunda descrição..."></textarea>
                    @error('p2') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ $editMode ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
