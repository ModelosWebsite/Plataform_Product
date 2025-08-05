<div>
    {{-- ESPAÇO DE ANÚNCIO START --}}
    <div class="col-12 justify-content-center d-flex position-relative">
        <div id="carouselExampleFade" class="carousel slide carousel-fade ad-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (isset($announcements) && count($announcements) > 0)
                    @foreach ($announcements as $announcement)
                        @if ($announcement['type'] === 'rectangle')
                            <div class="carousel-item active">
                                <a href="{{ $announcement['link'] }}" target="_blank" style="text-decoration: none;">
                                    <img src="{{ url($announcement['image']) }}" class="ad-image" alt="Advertisement {{ $announcement['title'] ?? 'Image' }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <!-- Ícone de informação -->
            <div class="ad-info" title="Este é um espaço publicitário da responsabilidade de Fortcode">
                ℹ️
            </div>
        </div>
    </div>
    {{-- ESPAÇO DE ANÚNCIO END --}}

    <style>
        .ad-container {
            width: 728px;
            height: 120px;
            overflow: hidden;
            position: relative;
        }

        .ad-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ad-info {
            position: absolute;
            top: 50%;
            right: 0; /* Fixado na borda direita do ad-container */
            transform: translate(8%, -140%); /* Move um pouco para fora do container */
            color: white;
            padding: 6px 10px;
            border-radius: 50%;
            cursor: help;
            font-size: 14px;
            z-index: 10;
        }
    </style>
</div>