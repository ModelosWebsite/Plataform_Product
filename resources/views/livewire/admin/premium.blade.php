<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center mb-3">Adquira Elementos Premium</h5>
            <p class="text-center text-muted">Melhore seu site com recursos avançados</p>
        </div>
        
        <div class="card-body">
            <style>
    .package-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .package-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }

    .package-card img {
        height: 250px;
        object-fit: cover;
    }

    .package-card .card-body {
        padding: 1.5rem;
    }

    .package-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1d1d1f;
        margin-bottom: 0.5rem;
    }

    .package-card .card-text {
        font-size: 0.9rem;
        color: #6e6e73;
        min-height: 50px;
    }

    .package-card .price-btn {
        background-color: #0071e3;
        border: none;
        border-radius: 8px;
        padding: 0.6rem;
        font-weight: 500;
        font-size: 0.9rem;
        color: #ffff;
        transition: background-color 0.2s ease;
    }

    .package-card .price-btn:hover {
        background-color: #005bb5;
        color: #ffff;
    }
</style>

<div class="row g-4">
    @forelse($packages as $package)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card package-card text-center">
                <img src="{{ asset('storage/premium/'.$package->image) }}" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">{{ $package->title ?? '' }}</h5>
                    <p class="card-text">{{ $package->description ?? '' }}</p>
                    <button 
                        class="btn price-btn w-100"
                        wire:click="generate('{{ $package->id }}')"
                    >
                        Ativar por {{ number_format($package->amount, 2, '.', ' ') }} kz
                    </button>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Nenhum pacote disponível</p>
    @endforelse
</div>

        </div>
        @include("modals.premium")
    </div>
</div>

<script>
    window.addEventListener('openModal', event => {
        $('#modalPayment').modal('show');
    });
</script>