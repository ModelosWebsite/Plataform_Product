<div class="d-flex justify-content-evenly row">
    <div class="col-xl-6">
        <form wire:submit.prevent="imagebackgroundstore" enctype="multipart/form-data">
            
            <div class="form-group">
                <h5 class="form-label">Carregar Imagem</h5>
                <input type="file" wire:model="image" name="image" class="form-control" placeholder="Insira a informação...">
                @if ($fundoId && $currentImage)
                    <img src="{{ Storage::url("arquivos/background/$currentImage") }}" style="width: 10rem; height: 5rem;" alt="Imagem Atual">
                @endif
            </div>

            <div class="form-group">
                <h5 class="form-label">Secção</h5>
                <select wire:model="type" class="form-control">
                    <option selected disabled>Selecione uma secção para esta imagem</option>
                    <option value="Start">Inicio</option>
                    <option value="AboutMain">Sobre Principal</option>
                    <option value="AboutSecund">Sobre Segundaria</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="{{ $fundoId ? 'Atualizar' : 'Cadastrar' }}">
            </div>
        </form>
    </div>

    <div class="col-xl-6 d-flex justify-content-evenly flex-wrap">
        @foreach ($fundo as $item)  
            <div class="card p-1 border-0 rounded-full">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ Storage::url("arquivos/background/$item->image") }}" style="width: 7rem; height: 7rem; border-radius:50%;" alt="">
                    <button class="btn btn-primary mt-3" wire:click="load({{ $item->id }})">Editar</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
