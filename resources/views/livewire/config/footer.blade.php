<div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">Rodapé</h6>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="form-group col-6 col-lg-12">
                <h6 class="form-label">Telefone</h6>
                <input type="text" class="form-control form-control-sm" wire:model.defer="telefone" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu contacto..">
                @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-6 col-lg-12">
                <h6 class="form-label">Email</h6>
                <input type="email" class="form-control form-control-sm" wire:model.defer="email" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu email..">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-6 col-lg-12">
                <h6 class="form-label">Endereço</h6>
                <input type="text" class="form-control form-control-sm" wire:model.defer="endereco" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira o seu endereço..">
                @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-6 col-lg-12">
                <h6 class="form-label">Horário</h6>
                <input type="text" class="form-control form-control-sm" wire:model.defer="atendimento" {{ $isEditing ? '' : 'disabled' }} placeholder="Insira uma frase em destaque..">
                @error('atendimento') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-6 col-lg-12">
                <button class="btn btn-primary btn-sm px-4" wire:click="toggleEditMode()">
                    {{ $isEditing ? 'Cancelar' : 'Editar' }}
                </button>
                @if ($isEditing)
                    <button class="btn btn-success btn-sm px-4" wire:click="save()">Salvar</button>
                @endif
            </div>
            </div>
        </div>
</div>
