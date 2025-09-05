<div wire:ignore>
    <div class="row g-3">
        <!-- Definições de Cores -->
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 rounded h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 fw-bold">Definições de Cores</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione as cores que deseja usar no website:</p>
                    <form wire:submit.prevent="storecolor" class="d-grid gap-3">
                        
                        <div>
                            <p class="form-label small fw-bold">Cor de Fundo</p>
                            <input type="color" wire:model="codigo" name="codigo" class="form-control form-control-sm">
                        </div>

                        <div>
                            <p class="form-label small fw-bold">Cor do Texto</p>
                            <input type="color" wire:model="letra" name="letra" class="form-control form-control-sm">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Definições de Tema -->
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0 rounded h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 fw-bold">Definições de Tema</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione o tema que deseja usar no website:</p>
                    
                    <div class="row g-3">
                        @foreach($themes as $theme)
                            <div class="col-6 col-md-4">
                                <div class="card h-100 shadow-sm border 
                                    @if($theme->id == $theme_id) border-primary @endif" 
                                    style="cursor:pointer;">

                                    <img src="{{ $theme->image ? asset('storage/theme/'.$theme->image) : asset('image/2525.png') }}" 
                                         class="card-img-top img-fluid" 
                                         alt="Imagem do Tema">

                                    <div class="card-body text-center">
                                        <h6 class="card-title text-truncate">{{ $theme->description }}</h6>
                                        
                                        @if($theme->id == $theme_id)
                                            <span class="badge bg-primary">Selecionado</span>
                                        @else
                                            <button wire:click="setTheme({{ $theme->id }})" class="btn btn-outline-primary btn-sm mt-2 w-100">
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
