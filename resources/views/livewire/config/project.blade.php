<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h6 class="card-title mb-0">
                Trabalhos
            </h6>
        </div>
        <div class="card-body">
            <form wire:submit="storeOrUpdateProject" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-6 col-lg-12">
                        <h6 class="form-label ">Fotografia</h6>
                        <input type="file" wire:model="image" name="image" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-6 col-lg-12">
                        <h6 class="form-label">Nome do Projecto:</h6>
                        <input type="text" class="form-control form-control-sm" wire:model="title" name="title" placeholder="Insira o nome do projecto...">
                    </div>
                </div>

                <!-- Campo oculto para ID do projeto (para edição) -->
                <input type="hidden" wire:model="projectId">

                <div class="form-group">
                    <input type="submit" value="{{ $projectId ? 'Atualizar' : 'Adicionar' }}" class="btn btn-primary btn-sm">
                    <a class="btn btn-primary mx-2 btn-sm" onclick="openTab(event, 'footer')"> Proximo </a>
                </div>
            </form>

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
    </div>
</div>