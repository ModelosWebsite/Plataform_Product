<div class="row">
    <!-- Formulário -->
    <div class="col-md-5 mb-4">
        <div class="card shadow-sm border-0 rounded h-100">
            <div class="card-body">
                <h6 class="card-title">Caro utilizador é obrigatorio adicionar todas as imagens</h6>
                <form wire:submit.prevent="imagebackgroundstore" enctype="multipart/form-data">
                    <!-- Upload -->
                    <div class="mb-3">
                        <p class="form-label fw-bold">Carregar Imagem</p>
                        <input type="file" wire:model="image" name="image" class="form-control">

                        @if ($fundoId && $currentImage)
                            <div class="mt-2 text-center">
                                <img src="{{ Storage::url("arquivos/background/$currentImage") }}"
                                     class="img-thumbnail rounded"
                                     style="width: 12rem; height: 7rem; object-fit: cover;"
                                     alt="Imagem Atual">
                                <p class="text-muted small mt-1">Imagem atual</p>
                            </div>
                        @endif
                    </div>

                    <!-- Secção -->
                    <div class="mb-3">
                        <p class="form-label fw-bold">Secção</p>
                        <select wire:model="type" class="form-select shadow-none">
                            <option selected>Selecione uma secção para esta imagem</option>
                            <option value="Start">Início</option>
                            <option value="AboutMain">Sobre Principal</option>
                            <option value="AboutSecund">Sobre Secundária</option>
                            <option value="Hero">Primeira Sessão</option>
                            <option value="Rodapé">Rodapé</option>
                        </select>
                    </div>

                    <!-- Botão -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ $fundoId ? 'Atualizar' : 'Cadastrar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lista de imagens -->
    <div class="col-md-7">
        <div class="row g-3">
            @foreach ($fundo as $item)
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 rounded text-center h-100">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ Storage::url('arquivos/background/' . $item->image) }}"
                                 class="rounded-circle mb-2"
                                 style="width: 7rem; height: 7rem; object-fit: cover;"
                                 alt="Imagem de Fundo">

                            <h6 class="fw-bold mb-2">{{ $item->tipo }}</h6>

                            <button class="btn btn-outline-primary btn-sm w-100 mt-auto"
                                    wire:click="load({{ $item->id }})">
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
