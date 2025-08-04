<div class="col-md-12">
    <table class="table table-striped table-responsive-md">
        <thead class="bg-primary text-white">
            <tr>
                <th>Cliente</th>
                <th>Endereço</th>
                <th>Tel</th>
                <th>Pagamento</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deliveries as $delivery)
                @if(isset($delivery['delivery']))
                    @php $d = $delivery['delivery']; @endphp
                    <tr>
                        <td>{{ $d['client'] }}</td>
                        <td>{{ $d['address'] }}</td>
                        <td>{{ $d['phone'] }}</td>
                        <td>{{ $d['isPaid'] }}</td>
                        <td>{{ $d['total'] }}</td>
                        <td>
                            @if($d['status'] === 'PENDENTE')
                                <span wire:click="updateStatus({{ $d['reference'] }}, 'ACEITE')" class="badge badge-info p-2" style="cursor: pointer;">
                                    <i class="fa fa-spinner fa-spin-pulse"></i> {{ $d['status'] }}
                                </span>
                            @elseif($d['status'] === 'ACEITE')
                                <span class="badge badge-success p-2">
                                    <i class="fa fa-check-circle"></i> {{ $d['status'] }}
                                </span>
                            @else
                                <span class="badge badge-danger p-2">
                                    <i class="fa fa-times-circle"></i> Estado inválido
                                </span>
                            @endif
                        </td>
                        <td>
                            <button wire:click="download({{ $d['reference'] }})" class="btn btn-sm btn-dark" title="Download do recibo">
                                <i class="bi bi-download"></i>
                            </button>
                            <button data-toggle="modal" data-target="#detail" wire:click="deliveryItens({{ $d['reference'] }})" class="btn btn-sm btn-dark">
                                <i class="bi bi-card-list"></i>
                            </button>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="7" class="text-center text-muted">Entrega inválida</td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="7">
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                            <p>Nenhuma Encomenda Encontrada</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @include("livewire.admin.detail")
</div>
