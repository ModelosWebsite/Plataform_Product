@section("title" , "Estados da encomenda")
<div style="background: rgba(223, 223, 223, 0.932)">
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-12" >
              <div class="card text-dark" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    {{-- <h6 class="fw-bold  text-uppercase text-center">Estado da sua Encomenda</h6> --}}
                    <div>
                      <div class="container d-flex col-md-12 align-items-center -bottom-3">
                        <div class="col-md-6 mx-2">
                            <div class="text-light p-1 mb-1" style="background: #F4C400">
                                <h5 class=" text-uppercase text-center">Estado da Encomenda</h5>
                            </div>
                          @foreach ($data as $delivery)
                            <div class="form-group">
                                <label for="" class="form-label fw-bold">Encomenda nº: {{ $delivery->delivery->reference }}</label>
                            </div>
                
                            <div class="form-group">
                                <label for="" class="form-label fw-bold">Cliente: {{ $delivery->delivery->client }}</label>
                            </div>
                
                            <div class="form-group">
                                <label for="" class="form-label fw-bold">Email: {{ $delivery->delivery->email }}</label>
                            </div>
                
                            <div class="form-group">
                                <label for="" class="form-label fw-bold">Telefone: {{ $delivery->delivery->phone }}</label>
                            </div>
                
                            <div class="form-group">
                                <label for="" class="form-label fw-bold">NIF: {{ $delivery->delivery->taxPayer }}</label>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label fw-bold">Endereço: {{ $delivery->delivery->address }}</label>
                            </div>

                          <div class="form-group">
                              <label for="" class="form-label fw-bold">Taxa PB: {{ $delivery->delivery->taxPb }}</label>
                          </div>

                          <div class="form-group">
                              <label for="" class="form-label fw-bold">Desconto: {{ $delivery->delivery->discount }}</label>
                          </div>

                          <div class="form-group">
                            <label for="" class="form-label fw-bold">Preço de Entrega: {{ $delivery->delivery->deliveryPrice }}</label>
                          </div>

                          <div class="form-group">
                            <label for="" class="form-label fw-bold">Total: {{ $delivery->delivery->total }}</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="form-label fw-bold">Pagamento: {{ $delivery->delivery->isPaid }}</label>
                          </div>
                          <div class="form-group">
                            <label for="" class="form-label fw-bold">Data: {{ $delivery->delivery->date }}</label>
                          </div>
                            
                        </div>
                
                        <div class="col-md-6">
                          <img src="{{asset("delivery.svg")}}" width="100%" alt="">
                          @if (($delivery->delivery->status) === "PENDENTE")
                            <div class="text-light p-1 mt-5 bg-danger">
                                <h5 class=" text-uppercase text-center">{{$delivery->delivery->status}}</h5>
                            </div>
                          @elseif (($delivery->delivery->status) === "ENTREGUE")
                            <div class="text-light p-1 mt-5 bg-success">
                                <h5 class=" text-uppercase text-center">{{$delivery->delivery->status}}</h5>
                            </div>
                          @else

                          @endif
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>