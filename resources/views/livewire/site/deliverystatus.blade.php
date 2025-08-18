@section("title" , "Estados da encomenda")
<div style="background: rgba(223, 223, 223, 0.932)">
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12" >
          <div class="card text-dark" style="border-radius: 1rem;">
            <div class="card-body p-4">
              <div class="container">
                <h5 for="qtd" class="form-label">Número da encomenda</h5>
                
                <div class="row mb-2">
                  <div class="form-group col-6">
                      <input type="number" class="form-control shadow-none" placeholder="Insira número de telefone" wire:model="phoneNumber">
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                      <input type="number" class="form-control shadow-none" placeholder="Insira número da encomenda" wire:model="deliveryNumber" aria-label="Recipient’s username" aria-describedby="button-addon2">
                      <button wire:click="setDelivery" class="btn btn-dark" type="button" id="button-addon2">Verificar</button>
                    </div>
                  </div>
                </div>

                <div class="container">
                    <!-- Delivery Data -->
                    @if (!empty($data) && is_array($data))
                        @foreach ($data as $delivery)
                            <div class="row mb-4 align-items-center" wire:poll.5000ms>
                                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                    <div class="bg-dark text-white rounded p-2 mb-3 text-center">
                                        <h5 class="text-uppercase mb-0">Estado da Encomenda</h5>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Encomenda nº:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['reference'] ?? 'N/A' }}</span>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Cliente:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['client'] ?? 'N/A' }}</span>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Email:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['email'] ?? 'N/A' }}</span>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Telefone:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['phone'] ?? 'N/A' }}</span>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">NIF:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['taxPayer'] ?? 'N/A' }}</span>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Endereço:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['address'] ?? 'N/A' }}</span>
                                    </div>

<div class="row mb-1">
    <label class="col-6 fw-bold">Taxa PB:</label>
    <div class="col-4 text-end">
        {{ str_replace(['.', ','], ['  ', '.'], $delivery['delivery']['taxPb'] ?? 'N/A') }}
    </div>
</div>

<div class="row mb-1">
    <label class="col-6 fw-bold">Desconto:</label>
    <div class="col-4 text-end">
        {{ str_replace(['.', ','], ['  ', '.'], $delivery['delivery']['discount'] ?? 'N/A') }}
    </div>
</div>

<div class="row mb-1">
    <label class="col-6 fw-bold">Total:</label>
    <div class="col-4 text-end">
        {{ str_replace(['.', ','], ['  ', '.'], $delivery['delivery']['total'] ?? 'N/A') }} Kz
    </div>
</div>

<div class="row mb-1">
    <label class="col-6 fw-bold">Preço de Entrega:</label>
    <div class="col-4 text-end">
        {{ str_replace(['.', ','], ['  ', '.'], $delivery['delivery']['deliveryPrice'] ?? 'N/A') }} 
    </div>
</div>


                                    <div class="mb-1">
                                        <label class="form-label fw-bold">Data:</label>
                                        <span class="ms-2">{{ $delivery['delivery']['date'] ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                                    @livewire('announcements.rectangle')

                                    <img src="{{ asset('delivery.svg') }}" class="img-fluid mb-3" alt="Delivery Image">

                                    @php
                                        $statusClasses = [
                                            'PENDENTE' => 'bg-danger',
                                            'ACEITE' => 'bg-success',
                                            'ENTREGUE' => 'bg-success',
                                            'A CAMINHO' => 'bg-primary',
                                            'FINALIZADO' => 'bg-success',
                                            'EM PREPARAÇÃO' => 'bg-warning',
                                            'PRONTO' => 'bg-info',
                                        ];
                                        $statusClass = $statusClasses[$delivery['delivery']['status'] ?? ''] ?? 'bg-secondary';
                                    @endphp

                                    <div class="text-white p-2 mt-3 rounded {{ $statusClass }}">
                                        <h5 class="text-uppercase text-center mb-0">{{ $delivery['delivery']['status'] ?? 'DESCONHECIDO' }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-5" style="min-height: 25rem; border: 1px dashed #000;">
                            <h5 class="text-muted text-center text-uppercase">Nenhuma Encomenda encontrada</h5>
                        </div>
                    @endif
                </div>
              </div>
                <h5 class="text-center">Caro cliente informamos que, temos outras lojas disponiveis. by@grupo xZero - in Website Cássico</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

      {{-- Botão flutuante circular Home --}}
    <a href="{{ route('plataforma.produto.index', ['company' => session("companyhashtoken") ?? '0']) }}" class="btn-home-float" title="Voltar para a página inicial">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24" width="28" height="28">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H4a.75.75 0 01-.75-.75V9.75z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 21V12h6v9" />
      </svg>
    </a>

    <style>
      .btn-home-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #000;
        color: white;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
        transition: background-color 0.3s ease;
        z-index: 9999;
      }
      .btn-home-float:hover {
        background-color: #333;
        text-decoration: none;
      }
    </style>
</div>