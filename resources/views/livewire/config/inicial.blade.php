<div>
    <h3 class="mb-4">Hero Inicial</h3>

    @if ($hero->isNotEmpty() && !$hero_id)
        @php $item = $hero->first(); @endphp
        <div class="card shadow-sm border-0 text-center p-4">
            <!-- Imagem circular -->
            <div class="d-flex justify-content-center mb-3">
                <div class="" style="width: 10rem; height: 10rem;">
                    <img src="{{ Storage::url("arquivos/hero/".$item->img) }}" 
                         alt="{{ $item->title }}" 
                         class="img-fluid h-100 w-100 object-fit-cover">
                </div>
            </div>

            <!-- Conteúdo -->
            <h4 class="fw-bold">{{ $item->title }}</h4>
            <p class="text-muted mb-4">{{ $item->description }}</p>

            <!-- Botão Editar -->
            <button class="btn btn-primary px-4" wire:click="loadHeroData({{ $item->id }})">
                <i class="bi bi-pencil-square me-1"></i> Editar
            </button>
        </div>
    @else
        {{-- Formulário de Criação/Edição --}}
        <form wire:submit.prevent="heroSave" enctype="multipart/form-data" class="card shadow-sm border-0 p-4">
            
            <!-- Upload de Imagem -->
            <div class="mb-2">
                <p for="image" class="form-label fw-bold">Fotografia</p>
                <input type="file" id="image" name="image" wire:model="image" class="form-control">
                @error('image') <span class="text-danger small">{{ $message }}</span> @enderror

                @if ($img && !$image)
                    <p>Imagem atual: {{ $img }}</p>
                @endif
            </div>

            <!-- Título -->
            <div class="mb-2">
                <p for="title" class="form-label fw-bold">Título</p>
                <input type="text" id="title" name="title" wire:model.defer="title" class="form-control" placeholder="Insira a informação...">
                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- Descrição -->
            <div class="mb-2">
                <p for="description" class="form-label fw-bold">Descrição</p>
                <textarea id="description" name="description" wire:model.defer="description" class="form-control" rows="5" placeholder="Insira uma descrição..."></textarea>
                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <!-- Botão -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">
                    {{ $hero_id ? 'Atualizar' : 'Cadastrar' }}
                </button>
            </div>
        </form>
    @endif
</div>
