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
                      <input type="text" class="form-control shadow-none" placeholder="Insira email" wire:model="email">
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                      <input type="text" class="form-control shadow-none" placeholder="Insira número da encomenda" wire:model="deliveryNumber" aria-label="Recipient’s username" aria-describedby="button-addon2">
                      <button wire:click="setDelivery" class="btn btn-dark" type="button" id="button-addon2">Verificar</button>
                    </div>
                  </div>
                </div>

                @if ($data->isNotEmpty())
                  @foreach ($data as $delivery)
                  <div class="row mb-4 align-items-center" wire:poll.10ms>
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                      <div class="bg-dark rounded text-light p-2 mb-3 text-center">
                        <h5 class="text-uppercase">Estado da Encomenda</h5>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Encomenda nº: {{ $delivery->delivery->reference }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Cliente: {{ $delivery->delivery->client }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Email: {{ $delivery->delivery->email }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Telefone: {{ $delivery->delivery->phone }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">NIF: {{ $delivery->delivery->taxPayer }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Endereço: {{ $delivery->delivery->address }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Taxa PB: {{ $delivery->delivery->taxPb }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Desconto: {{ $delivery->delivery->discount }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Total: {{ $delivery->delivery->total }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Preço de Entrega: {{ $delivery->delivery->deliveryPrice }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Data: {{ $delivery->delivery->date }}</label>
                      </div>
                    </div>
                    
                    <div class="col-12 col-lg-6 mt-2">
                      @livewire("announcements.rectangle")

                      <img src="{{ asset('delivery.svg') }}" class="img-fluid mb-3" alt="Delivery Image">
                      @if ($delivery->delivery->status === 'PENDENTE')
                        <div class="text-light p-1 mt-3 bg-danger rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'ACEITE')
                        <div class="text-light p-1 mt-3 bg-success rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'ENTREGUE')
                        <div class="text-light p-1 mt-3 bg-success rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'A CAMINHO')
                        <div class="text-light p-1 mt-3 bg-primary rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'FINALIZADO')
                        <div class="text-light p-1 mt-3 bg-success rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'EM PREPARAÇÃO')
                        <div class="text-light p-1 mt-3 bg-warning rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'PRONTO')
                        <div class="text-light p-1 mt-3 bg-info rounded">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @endif
                    </div>
                  </div>
                  @endforeach
                @else
                  <div class="rounded col-md-12 d-flex justify-content-center align-items-center flex-column mt-5" style="height: 25em; border: 1px dashed #000;">
                      <h5 class="text-muted text-center text-uppercase">A consulta não retornou nenhum resultado</h5>
                  </div>
                @endif
              </div>
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