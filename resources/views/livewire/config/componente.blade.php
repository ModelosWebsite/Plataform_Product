<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">Prova social</h6>
        </div>
        <div class="card-body">
            <!-- Formulário -->
            <form wire:submit.prevent="storeOrUpdateComponent">
                <div class="form-group">
                    <h6 for="level" class="form-label">Prova</h6>
                    <select wire:model="elements" name="elements" class="form-control">
                        <option selected>Escolha a temática</option>
                        <option value="Trabalhos">Trabalhos Concluídos</option>
                        <option value="Experiência">Anos de Experiência</option>
                        <option value="Clientes">Total de Clientes</option>
                        <option value="Parceiros">Parceiros</option>
                        <option value="Premios">Premios</option>
                        <option value="Produtos">Produtos</option>
                    </select>
                </div>

                <div class="form-group">
                    <h6 for="level" class="form-label">Quantidade</h6>
                    <input type="text" wire:model="level" id="level" name="level" class="form-control" placeholder="Insira o número correspondente..." required>
                    @error('level') <!-- Exibe erro caso haja validação -->
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo oculto para o ID do componente (para edição) -->
                <input type="hidden" wire:model="selectedComponentId">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ $selectedComponentId ? 'Atualizar' : 'Adicionar' }}</button>
                </div>
            </form>

            <!-- Tabela de Componentes -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Elemento</th>
                            <th scope="col">Nível</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getComponents as $item)
                            <tr wire:key="component-{{ $item->id }}">
                                <td>{{ $item->element }}</td>
                                <td>{{ $item->level }}</td>
                                <td>
                                    <button class="btn btn-primary" wire:click="editComponent({{ $item->id }})">Editar</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Nenhum componente encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modais (incluir fora da tabela) -->
    @foreach ($getComponents as $item)
        @include("sbadmin.includes.modal.skill", ['item' => $item])
    @endforeach
</div>