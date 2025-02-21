<div wire:ignore>
    <h3>Hero Inicial</h3>
    <hr>
    <div>
        @if (!empty($hero) && $hero->count() > 0)
    {{-- Exibe os itens se existir conteúdo --}}
    <div>
        @foreach ($hero as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <p class="card-text">{{ $item->description }}</p>

                    <div class="text-center mb-3">
                        <div class="image-container" style="width: 10rem; height: 10rem; overflow: hidden; border-radius: 50%;">
                            <img src="{{ Storage::url("arquivos/{$item->img}") }}" alt="{{ $item->title }}" class="img-fluid">
                        </div>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}" wire:click="loadHeroData({{ $item->id }})">
                        Editar
                    </button>
                    @include("sbadmin.includes.modal")
                </div>
            </div>
        @endforeach
    </div>
@else
    {{-- Exibe o formulário se não existir conteúdo --}}
    <form wire:submit.prevent="heroSave" enctype="multipart/form-data">
        <div class="form-group">
            <h5 for="image" class="form-label">Fotografia</h5>
            <input type="file" id="image" name="image" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endif

    </div>
</div>