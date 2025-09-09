<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Sobre Mim</h6>

                <div>
                    <button class="btn btn-sm {{ $editMode ? 'btn-danger' : 'bg-white' }}" wire:click="toggleEditMode()">
                        {{ $editMode ? 'Cancelar' : 'Editar' }}
                    </button>

                    @if ($editMode)
                        <button class="btn btn-success btn-sm" wire:click="save()">Salvar</button>
                    @endif
                </div>
                {{-- <button class="btn btn-primary mx-2" onclick="openTab(event, 'service')"> Proximo </button> --}}
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $editMode ? 'updateAbout' : 'storeAbout' }}" enctype="multipart/form-data">
                <div class="form-group">
                    <h6 class="form-label">Imagem:</h6>
                    <input type="file" wire:model="image" {{ $editMode ? '' : 'disabled' }} class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <h6 class="form-label">Nome:</h6>
                    <input type="text" class="form-control form-control-sm" {{ $editMode ? '' : 'disabled' }} wire:model.defer="nome" name="nome" placeholder="Insira o seu nome...">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <h6 class="form-label">Profissão:</h6>
                    <input type="text" class="form-control form-control-sm" {{ $editMode ? '' : 'disabled' }} wire:model.defer="perfil" name="perfil" placeholder="Insira a sua profissão...">
                    @error('perfil') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div>
                    <div class="form-group">
                        <h6 class="form-label">Descrição:</h6>
                        <textarea name="p1" wire:model.defer="p1" {{ $editMode ? '' : 'disabled' }} class="form-control form-control-sm" cols="30" rows="4" placeholder="Insira uma breve descrição..."></textarea>
                        @error('p1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <h6 class="form-label">Descrição 1:</h6>
                        <textarea name="p2" wire:model.defer="p2" {{ $editMode ? '' : 'disabled' }} class="form-control form-control-sm" cols="30" rows="4" placeholder="Insira uma segunda descrição..."></textarea>
                        @error('p2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
