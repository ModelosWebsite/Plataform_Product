<div>
    <h3>Trabalhos</h3>
    <hr>
    <form wire:submit="storeOrUpdateProject" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h5 class="form-label">Fotografia</h5>
            <input type="file" wire:model="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <h5 class="form-label">Nome do Projecto:</h5>
            <input type="text" class="form-control" wire:model="title" name="title" placeholder="Insira o nome do projecto...">
        </div>

        <!-- Campo oculto para ID do projeto (para edição) -->
        <input type="hidden" wire:model="projectId">

        <div class="form-group">
            <input type="submit" value="{{ $projectId ? 'Atualizar' : 'Adicionar' }}" class="btn btn-primary">
            <a class="btn btn-primary mx-2" onclick="openTab(event, 'footer')"> Proximo </a>
        </div>
    </form>

    <hr>

    <!-- Cards de Projetos com Bootstrap -->
    <div class="row">
        @if (isset($getproject) && count($getproject))
            @foreach ($getproject as $item)
                <div class="col-md-5 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ Storage::url("arquivos/{$item->image}") }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body d-flex flex-column justify-between">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <div class="d-flex justify-content-between mt-auto">
                                <button class="btn btn-warning w-50 me-2 btn-sm" wire:click="edit({{ $item->id }})">Editar</button>
                                <button class="btn btn-danger w-50 btn-sm" wire:click="deleteproject({{ $item->id }})">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center text-muted">
                Nenhum projeto encontrado.
            </div>
        @endif
    </div>

</div>