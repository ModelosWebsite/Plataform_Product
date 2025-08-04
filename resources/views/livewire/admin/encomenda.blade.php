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
                <th>Acções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deliveries ?? [] as $delivery)
                @if (isset($delivery['delivery']))
                    @php $data = $delivery['delivery']; @endphp
                    <tr>
                        <td>{{ $data['client'] ?? '-' }}</td>
                        <td>{{ $data['address'] ?? '-' }}</td>
                        <td>{{ $data['phone'] ?? '-' }}</td>
                        <td>{{ ($data['isPaid'] ?? false) ? 'Pago' : 'Pendente' }}</td>
                        <td>{{$data['total'] ?? 0}}</td>
                        <td>
                            @switch($data['status'])
                                @case('PENDENTE')
                                    <span wire:click="updateStatus('{{ $data['reference'] }}', 'estado')" style="cursor: pointer; font-size:15px; font-weight:bold" class="badge badge-info p-2">
                                        <i class="fa fa-spinner fa-spin-pulse"></i> {{ $data['status'] }}
                                    </span>
                                    @break
                                @case('ACEITE')
                                    <span class="badge badge-success p-2" style="font-size:15px; font-weight:bold">
                                        <i class="fa fa-check-circle"></i> {{ $data['status'] }}
                                    </span>
                                    @break
                                @default
                                    <span class="badge badge-danger p-2" style="font-size:15px; font-weight:bold">
                                        <i class="fa fa-exclamation-triangle"></i> Estado Nulo
                                    </span>
                            @endswitch
                        </td>
                        <td>
                            @if($data['receipt'] != null)
                                <button title="Download do Recibo" wire:click="download('{{ $data['reference'] }}')" class="btn btn-sm text-white" style="background-color: #222831;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                    </svg>
                                </button>
                            @endif
                            <button data-toggle="modal" data-target="#detail" wire:click="deliveryItens('{{ $data['reference'] }}')" class="btn btn-sm text-white" style="background-color: #222831;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="7">
                            <div class="d-flex justify-content-center align-items-center flex-column" style="height: 30vh;">
                                <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                                <p class="text-muted mt-2">Nenhuma Encomenda Encontrada</p>
                            </div>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="7">
                        <div class="d-flex justify-content-center align-items-center flex-column" style="height: 30vh;">
                            <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2">Nenhuma Encomenda Encontrada</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @include("livewire.admin.detail")
</div>
