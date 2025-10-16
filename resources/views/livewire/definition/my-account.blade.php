<div class="col-12">
    <div class="row">
        <div class="col-lg-6 col-12">
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
                            <button class="btn btn-primary px-4" wire:click="toggleEditMode">
                                {{ $isEditing ? 'Cancelar' : 'Editar' }}
                            </button>
                            @if ($isEditing)
                                <button class="btn btn-success px-4" wire:click="saveProfile">Salvar</button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (auth()->user()->role === 'Administrador')
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Usuários</h6>
                        <button class="btn btn-sm btn-light mb-0" data-toggle="modal" data-target="#addUser"> Adicionar </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle nowrap-table">
                                <thead class="text-white bg-primary">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->name ?? '' }}</td>
                                            <td>{{ $user->email ?? '' }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
            @endif
        </div>
    </div>
    @include('modals.admin.create-user')
</div>