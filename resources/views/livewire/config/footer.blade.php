<div>
    <h3>Rodapé</h3>
    <hr>
    <div class="form-group">
        <label class="form-label">Telefone</label>
        <input type="text" class="form-control" wire:model.defer="telefone" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu contacto..">
        @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" wire:model.defer="email" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu email..">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Endereço</label>
        <input type="text" class="form-control" wire:model.defer="endereco" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu endereço..">
        @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Destaque</label>
        <input type="text" class="form-control" wire:model.defer="atendimento" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira uma frase em destaque..">
        @error('atendimento') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-primary px-4" wire:click="toggleEditMode()">
            {{ $isEditing ? 'Cancelar' : 'Editar' }}
        </button>
        @if ($isEditing)
            <button class="btn btn-success px-4" wire:click="save()">Salvar</button>
        @endif
    </div>
</div>
