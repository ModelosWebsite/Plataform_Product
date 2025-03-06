<div>
    <h3>Hero Inicial</h3>
    <div>
        @if ($hero->isNotEmpty() && !$hero_id && $hero->count() > 0)
            <div>
                @foreach ($hero as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->title }}</h4>
                            <p class="card-text">{{ $item->description }}</p>

                            <div class="text-center mb-3">
                                <div class="image-container" style="width: 10rem; height: 10rem; overflow: hidden; border-radius: 50%;">
                                    <img src="{{ Storage::url("arquivos/hero/".$item->img) }}" alt="{{ $item->title }}" class="img-fluid">
                                </div>
                            </div>

                            <button class="btn btn-primary" wire:click="loadHeroData({{ $item->id }})">
                                Editar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
                {{-- Formulário de Criação/Edição --}}
                <form wire:submit.prevent="heroSave" enctype="multipart/form-data">
                    <div class="form-group">
                        <h5 for="image" class="form-label">Fotografia</h5>
                        <input type="file" id="image" name="image" wire:model="image" class="form-control">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        
                        {{-- Pré-visualização da imagem existente ao editar --}}
                        @if ($img && !$image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($img) }}" alt="Imagem atual" class="img-thumbnail" style="max-width: 150px;">
                            </div>
                        @endif
                    </div>
        
                    <div class="form-group">
                        <h5 for="title" class="form-label">Título</h5>
                        <input type="text" id="title" name="title" wire:model.defer="title" class="form-control" placeholder="Insira a informação...">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
        
                    <div class="form-group">
                        <h5 for="description" class="form-label">Descrição</h5>
                        <textarea id="description" name="description" wire:model.defer="description" class="form-control" cols="30" rows="8" placeholder="Insira uma descrição..."></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ $hero_id ? 'Atualizar' : 'Cadastrar' }}
                        </button>
                        
                        @if ($hero_id)
                            <button type="button" class="btn btn-secondary" wire:click="clearForm">
                                Cancelar
                            </button>
                        @endif
                    </div>
                </form>
        @endif

    </div>
</div>
