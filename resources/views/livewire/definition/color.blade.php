<div wire:ignore>
    <div class="row">
        <div class="col-4">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 fw-bold">Definições de Cores</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione o tema que deseja usar no website:</p>
                    <form wire:submit.prevent="storecolor">
                        <div class="form-group">
                            <h6 class="form-label">Selecione uma cor Background</h6>
                            <input type="color" wire:model="codigo" name="codigo" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <h6 class="form-label">Selecione uma cor Para as letras</h6>
                            <input type="color" wire:model="letra" name="letra" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 fw-bold">Definições de Tema</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione o tema que deseja usar no website:</p>
                    
                    <div class="row g-3">
                        @foreach($themes as $theme)
                            <div class="col-md-4">
                                <div 
                                    class="card h-100 shadow-sm border 
                                    @if($theme->id == $theme_id) border-primary @endif" style="cursor:pointer;">

                                    {{-- Imagem de preview do tema --}}
                                    <img src="{{ asset('image/2525.png') }}" 
                                        class="card-img-top" 
                                        alt="Preview {{ $theme->name }}">

                                    <div class="card-body text-center">
                                        <h6 class="card-title">{{ $theme->name }}</h6>
                                        
                                        @if($theme->id == $theme_id)
                                            <span class="badge bg-primary">Selecionado</span>
                                        @else
                                            <button class="btn btn-outline-primary btn-sm mt-2">
                                                Usar este tema
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>