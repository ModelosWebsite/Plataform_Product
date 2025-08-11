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
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Insira número da encomenda" wire:model="deliveryNumber" aria-label="Recipient’s username" aria-describedby="button-addon2">
                  <button wire:click="setDelivery" class="btn btn-dark" type="button" id="button-addon2">Verificar</button>
                </div>
                @if ($data->isNotEmpty())
                  @foreach ($data as $delivery)
                  <div class="row mb-4 align-items-center">
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                      <div class="bg-dark text-light p-2 mb-3 text-center">
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
                          <label class="form-label fw-bold">Pagamento: {{ $delivery->delivery->isPaid }}</label>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label fw-bold">Data: {{ $delivery->delivery->date }}</label>
                      </div>
                    </div>
                    
                    <div class="col-12 col-lg-6">
                      <img src="{{ asset('delivery.svg') }}" class="img-fluid mb-3" alt="Delivery Image">
                      @if ($delivery->delivery->status === 'PENDENTE')
                        <div class="text-light p-1 mt-3 bg-danger">
                            <h5 class="text-uppercase text-center">{{ $delivery->delivery->status }}</h5>
                        </div>
                      @elseif ($delivery->delivery->status === 'ACEITE')
                        <div class="text-light p-1 mt-3 bg-success">
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
</div>