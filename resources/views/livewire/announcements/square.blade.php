<div>
    {{-- ESPAÇO DE ANÚNCIO START --}}
    <div class="col-12 justify-content-center d-flex">
        <div id="carouselExampleFade" class="carousel slide carousel-fade ad-containerb" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (isset($announcements) && count($announcements) > 0)
                    @foreach ($announcements as $announcement)
                        @if ($announcement['type'] === 'square')
                            <div class="carousel-item active">
                                <a href="{{ $announcement['link'] }}" target="_blank" style="text-decoration: none;">
                                    <img src="{{ url($announcement['image']) }}" class="ad-imageb" alt="Advertisement {{ $announcement['title'] ?? 'Image' }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="ad-infob" title="Este é um espaço publicitário da responsabilidade de Fortcode">
                ℹ️
            </div>
        </div>
    </div>
    {{-- ESPAÇO DE ANÚNCIO END --}}
    
    <style>
        .ad-containerb {
            width: 300px;
            height: 250px;
            overflow: hidden;
        }
    
        .ad-imageb {
            width: 300px;
            height: 250px;
            object-fit: cover; /* Mantém a proporção da imagem sem distorcer */
        }

        .ad-infob {
            position: absolute;
            top: 50%;
            right: 0; /* Fixado na borda direita do ad-container */
            transform: translate(8%, -390%); /* Move um pouco para fora do container */
            color: white;
            padding: 6px 10px;
            border-radius: 50%;
            cursor: help;
            font-size: 14px;
            z-index: 10;
        }
    </style>
</div>