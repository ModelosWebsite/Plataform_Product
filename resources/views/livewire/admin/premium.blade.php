<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center mb-3">Adquira Elementos Premium</h5>
            <p class="text-center text-muted">Melhore seu site com recursos avançados</p>
        </div>
        
        <div class="card-body">

                <style>
    .package-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        border: 1px solid #adadadff;
        background: #fff;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .package-img {
        flex-shrink: 0;
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
    }

    .package-info {
        flex: 1;
    }

    .package-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1d1d1f;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: -1rem;
    }

    .package-description {
        font-size: 0.85rem;
        color: #6e6e73;
        margin-bottom: 6px;
    }

    .package-price {
        font-size: 0.9rem;
        font-weight: 500;
        color: #0071e3;
        display: block;
        margin-bottom: 8px;
    }

    .package-btn {
        background-color: #0071e3;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 10px;
        font-size: 0.8rem;
        transition: background 0.2s ease;
        width: 100px;
    }

    .package-btn:hover {
        background-color: #005bb5;
    }

    .package-btn-secondary {
        background-color: transparent;
        color: #0071e3;
        border: 1px solid #0071e3;
        border-radius: 6px;
        padding: 6px 10px;
        font-size: 0.8rem;
        width: 100px;
        margin-top: 5px;
        transition: all 0.2s ease;
    }

    .package-btn-secondary:hover {
        background-color: #0071e3;
        color: white;
    }

    /* Responsivo */
    @media (max-width: 576px) {
        .package-item {
            flex-direction: column;
            align-items: flex-start;
        }
        .package-img {
            width: 100%;
            height: 180px;
        }
        .package-title {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        .package-btn,
        .package-btn-secondary {
            width: 100%;
        }
    }
</style>

<div class="package-list col-12 row">
    @forelse($packages as $package)
        <div class="package-item col-6">
            <img src="{{ asset('storage/premium/'.$package->image) }}" class="package-img">

            <div class="package-info">
                <div class="package-title">
                    <span>{{ $package->title ?? '' }}</span>
                    <div class="d-flex flex-column">
                        <button class="package-btn" wire:click="generate('{{ $package->id }}')">
                            Ativar
                        </button>
                        <button class="package-btn-secondary" data-toggle="modal" data-target="#package-details"  wire:click="viewDetails('{{ $package->id }}')">
                            Saber mais
                        </button>
                    </div>
                </div>
                <p class="package-description">{{ Str::limit($package->description, 50)?? '' }}</p>
                <span class="package-price">
                    {{ number_format($package->amount, 2, '.', ' ') }} kz
                </span>

            </div>
        </div>
    @empty
        <p class="text-muted text-center">Nenhum pacote disponível</p>
    @endforelse
</div>


        </div>
        @include("modals.premium")
        @include("modals.admin.details-premium")

    </div>
</div>

<script>
    window.addEventListener('openModal', event => {
        $('#modalPayment').modal('show');
    });
</script>