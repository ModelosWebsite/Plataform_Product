<div wire:ignore>
    <div class="row g-3">
        <!-- Definições de Cores -->
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h6 class="card-title mb-0 fw-bold">Definições de Cores</h6>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione as cores que deseja usar no website:</p>
                    <form wire:submit.prevent="storecolor" class="d-grid gap-3">
                        
                        <div class="form-group">
                            <h6 class="form-label fw-bold">Cor de Fundo</h6>
                            <input type="color" wire:model="codigo" name="codigo" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <h6 class="form-label fw-bold">Cor do Texto</h6>
                            <input type="color" wire:model="letra" name="letra" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Definições de Tema -->
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h6 class="card-title mb-0 fw-bold">Definições de Tema</h6>
                </div>
                <div class="card-body">
                    <p class="mb-3">Selecione o tema que deseja usar no website:</p>
                    @php
                        $theme_id = $themeSelected ? $themeSelected->theme->id : null;
                    @endphp
                    <div class="row g-3">
                        @foreach($themes as $theme)
                            <div class="col-6 col-md-4">
                                <div class="card h-100 shadow-sm border 
                                    @if($theme->id == $theme_id) border-primary @endif" 
                                    style="cursor:pointer;">

                                    <img src="{{ $theme->image ? asset('storage/theme/'.$theme->image) : asset('image/2525.png') }}" class="card-img-top img-fluid @if($theme->id == $theme_id) opacity-50 @endif" alt="Imagem do Tema">

                                    <div class="card-body text-center">
                                        <h6 class="card-title text-truncate">{{ $theme->description }}</h6>
                                        
                                        @if($theme->id == $theme_id)
                                            <span class="badge bg-primary text-white p-2" style="font-size: 1rem">Selecionado</span>
                                        @else
                                            <button wire:click="setTheme({{ $theme->id }})" class="btn btn-sm btn-outline-primary mt-2">
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
