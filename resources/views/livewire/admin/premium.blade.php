<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center mb-3">Adquira Elementos Premium</h5>
            <p class="text-center text-muted">Melhore seu site com recursos avançados</p>
        </div>
        
        <div class="card-body">
            <div class="row col-12">
                @forelse($packages as $package)
                    <div class="col-lg-3">
                        <div class="card border text-center">
                            <img style="whith: 200px;" src="{{asset('storage/premium/'.$package->image)}}" class="card-img-top image-fluid">
                            <div class="card-body">
                                <h5 class="card-title">{{$package->title ?? ''}}</h5>
                                <p class="card-text">{{$package->description ?? ''}}</p>
                                <button class="btn btn-sm btn-primary w-100" wire:click="generate('{{$package->id}}')">Ativar por {{ number_format($package->amount, 2,'.', ' ' ?? '0.00') }} kz</button>
                            </div>
                        </div>
                    </div>
                @empty

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