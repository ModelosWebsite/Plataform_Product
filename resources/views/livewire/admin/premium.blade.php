<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0 text-center">Active Elementos Premiums</h5>
            <p class="text-center mb-0">Melhore o seu site com recursos avançados</p>
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
                    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
                    transition: transform 0.2s ease;
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
                    gap: 10px;
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


                /* Responsividade */

                /* Mobile até 576px */
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

                /* Tablets (576px até 768px) */
                @media (min-width: 577px) and (max-width: 768px) {
                    .package-item {
                        flex-direction: column;
                        align-items: center;
                        text-align: center;
                    }
                    .package-img {
                        width: 120px;
                        height: 120px;
                    }
                    .package-title {
                        flex-direction: column;
                        align-items: center;
                    }
                }

                /* Tablets maiores / pequenos notebooks (769px até 992px) */
                @media (min-width: 769px) and (max-width: 992px) {
                    .package-img {
                        width: 100px;
                        height: 100px;
                    }
                    .package-title {
                        font-size: 1.1rem;
                    }
                }

                /* Notebooks / desktops médios (993px até 1200px) */
                @media (min-width: 993px) and (max-width: 1200px) {
                    .package-item {
                        gap: 20px;
                    }
                    .package-img {
                        width: 110px;
                        height: 110px;
                    }
                }

                /* Telas muito grandes (acima de 1400px) */
                @media (min-width: 1400px) {
                    .package-item {
                        padding: 20px;
                        gap: 25px;
                    }
                    .package-img {
                        width: 130px;
                        height: 130px;
                    }
                    .package-title {
                        font-size: 1.2rem;
                    }
                    .package-price {
                        font-size: 1rem;
                    }
                }
            </style>


        <div class="package-list row row-cols-1 row-cols-lg-2">
            @forelse($packages as $package)
                <div class="package-item col-6 mb-3">
                    <img src="{{ asset('storage/premium/'.$package->image) }}" class="package-img">

                    <div class="package-info">
                        <div class="package-title">
                            <span >{{ $package->view_description ?? '' }}</span>
                            <div class="d-flex flex-column mb-4">
                                @php
                                    $isActive = $packagesExtras->contains('functionality_plus_id', $package->id);
                                @endphp

                                @if($isActive)
                                    <button class="package-btn" disabled style="background-color: #28a745;">
                                        Activo
                                    </button>
                                @else
                                    <button class="package-btn" wire:click="generate('{{ $package->id }}')">
                                        Ativar
                                    </button>
                                @endif

                                <button class="package-btn-secondary" data-toggle="modal" data-target="#package-details" wire:click="viewDetails('{{ $package->id }}')">
                                    Saber mais
                                </button>
                            </div>
                        </div>
                        <span class="package-price">
                            {{ number_format($package->amount, 2, '.', ' ') }} kz Por mês
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