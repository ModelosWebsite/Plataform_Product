<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">Meu Perfil</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-12">
                    <h5 for="name" class="form-label">Nome:</h5>
                    <input type="text" id="name" class="form-control" wire:model="name" {{ $isEditing ? '' : 'disabled' }}>
                </div>

                <div class="form-group col-12">
                    <h5 for="email" class="form-label">E-mail:</h5>
                    <input type="email" id="email" class="form-control" wire:model="email" {{ $isEditing ? '' : 'disabled' }}>
                </div>

                @if ($isEditing)
                    <div class="form-group col-12">
                        <h5 for="password" class="form-label">Nova Palavra Passe:</h5>
                        <input type="password" id="password" class="form-control" wire:model="password">
                    </div>

                    <div class="form-group col-12">
                        <h5 for="password_confirmation" class="form-label">Confirmar Palavra Passe:</h5>
                        <input type="password" id="password_confirmation" class="form-control" wire:model="password_confirmation">
                    </div>
                @endif

                <div class="form-group col-12">
                    <button class="btn btn-primary px-4" wire:click="toggleEditMode()">
                        {{ $isEditing ? 'Cancelar' : 'Editar' }}
                    </button>
                    @if ($isEditing)
                        <button class="btn btn-success px-4" wire:click="saveProfile()">Salvar</button>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
