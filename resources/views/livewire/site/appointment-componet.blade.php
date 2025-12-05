<div wire:poll.200ms="checkPayment">
    <style>
        .service-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            line-height: 70px;
            border-radius: 50%;
            font-size: 28px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 20px;
        }

        .price span {
            color: #000;
        }

        .btn-custom {
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }
    </style>
    
    <!-- Adiciona Bootstrap -->
    <div class="container-fluid">
        <div class="row g-4">
            @forelse($appointments as $appointment)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm border-0 h-100 text-center p-3">
                        <div class="card-body d-flex flex-column">

                            <h5 class="fw-bold text-break">
                                {{ $appointment->title ?? "" }}
                            </h5>

                            <p class="text-muted mt-3 flex-grow-1">
                                {{ $appointment->description ?? "" }}
                            </p>

                            <h5 class="fw-semibold mt-2 mb-3">
                                Custo:
                                {{ number_format($appointment->cost,2,'.', ' ') ?? "" }} kz
                            </h5>

                            @if($appointment->type === 'free')
                                <button class="btn btn-success mt-auto" wire:click="markingFree({{ $appointment->id }})">
                                    Marcar
                                </button>
                            @else
                                <button class="btn btn-success mt-auto" wire:click="marking({{ $appointment->id }})">
                                    Marcar
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
                @include('modals.site.paymentMarking')
            @empty
            @endforelse
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</div>

<script>
    // Quando o evento Livewire for emitido
    document.addEventListener('openModalMarking', () => {
        const modalElement = document.getElementById('markingPaymet');
        const modalInstance = new bootstrap.Modal(modalElement);
        modalInstance.show();
    });
</script>

<script>
    document.addEventListener('closepaymentmodal', (event)=> {
        $("#closepaymentmarking").trigger('click')
    })
</script>