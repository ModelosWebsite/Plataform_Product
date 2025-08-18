<div wire:poll>
    <main id="main" style="margin-top: 1.3rem;">
        <section class="shopping-cart spad">
            <div class="container-fluid px-3 px-md-3 px-lg-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="table responsive">
                            <table class="table">
                                <thead class="text-white" style="background: var(--color)">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>Dtd.</th>
                                        <th>Total</th>
                                        <th class="text-center">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($cartContent as $key=> $item)
                                    <tr>
                                        <td class="d-flex">
                                            <div class="mr-3">
                                                @if ($item->attributes->image != null)
                                                    <img style="width: 60px" src="{{asset('storage/items/'.$item->attributes->image)}}" class="img-fluid product-thumbnail">
                                                @else 
                                                    <img style="width: 60px" src="{{asset("notfound.png")}}" class="menu-img img-fluid" alt="">
                                                @endif
                                            </div>
                                            <div class="mt-3">
                                                <h6>{{ $item->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-end">
                                                {{ number_format($item->price, 2,'.', ' ') }} kz
                                            </div>
                                        </td>
                                        <td>
                                            <input class="quantity-input" wire:model="qtd.{{$item->id}}" value="{{ $cartQuantities[$item->id] ?? $item->quantity }}" type="number" min="1"
                                            wire:change="updateQuantity({{ $item->id }}, $event.target.value, '{{ $item->name }}')">
                                        </td>
                                        <td>
                                            <div style="text-align: left !important">
                                                {{ number_format($item->price * $item->quantity, 2,'.', ' ') }} kz
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button  wire:click='remove({{$item->id}})' style="color: red; border: none; backgound: #fff">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="25" fill="currentColor" class="bi bi-trash3-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                   @empty
                                       <tr>
                                            <td colspan="12">
                                                <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>
                                                    <p class="text-muted">Nenhum Item selecionado no carrinho</p>
                                                </div>
                                            </td>
                                       </tr>
                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__discount">
                            <form wire:submit.prevent='cuponDiscount'>
                                <input required type="text" wire:model="code" name="cupon" placeholder="Insira o codigo do cupon">   
                                <button  type="submit" style="background: var(--color); color:#fff; border: none;">Aplicar</button>
                            </form>
                        </div>
                        <div class="cart__total">
                            <div class="line">
                                <h6>Total do Carrinho</h6>
                                <ul>
                                    <li>Subtotal <span id="subtotal">{{ number_format(abs($getSubTotal), 2, '.', ' ') }} Kz</span></li>
                                    <li>Entrega <span id="subtotal">{{ number_format(abs($localizacao), 2, '.', ' ') }} Kz</span></li>
                                    <li>Taxa PB <span>{{ number_format($taxapb, 2, '.', ' ') }} Kz</span> </li>
                                    <li>Total <span id="total">{{number_format($totalFinal - session("discountvalue"), 2, '.', ' ')}} kz</span></li>
                                </ul>
                            </div>

                            @if($deliveryType === 'Entregadores PB')
                                @if (isset($locations) and $locations->count() > 0)
                                    @foreach ($locations as $key => $item)
                                        <div class="form-check">
                                            <input wire:click="selectLocation({{ $item['price'] }})" class="form-check-input checked"
                                                type="radio" id="flexRadioDefault{{ $key + 1 }}" name="location" value="{{ $item['price'] }}">
                                            <label class="form-check-label" for="flexRadioDefault{{ $key + 1 }}" style="cursor: pointer">
                                                {{ $item['location'] }} - {{ number_format($item['price'], 2, '.', ' ') }} kz
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                            
                            <button type="button" {{count($cartContent) > 0 ? '':'disabled'}} class="primary-btn btn btn-primary mt-2"
                                style="background: var(--color); color:#fff; border: none;" data-bs-toggle="modal"
                                data-bs-target="#checkout" id="getLocationButton">Finalizar Compra
                            </button>
                             @include("livewire.site.checkout")
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include("site.pages.style")
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

</div>

{{-- //get location latitude in longitude in client --}}
<script>
    const button = document.getElementById('getLocationBtn');
    const output = document.getElementById('output');

    navigator.geolocation.getCurrentPosition(
        (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            @this.call('setLocation', latitude, longitude);
        },
        (error) => {
            console.error('Erro ao obter localização:', error.message);
            output.innerText = "Não foi possível obter a localização.";
        }
    );
</script>