<div class="untree_co-section product-section before-footer-section" style="margin-top: 3rem;">
<div class="container">
    <div class="row">
        @if ($getCollectionsItens && isset($getCollectionsItens) && count($getCollectionsItens) > 0)
            @foreach($getCollectionsItens as $item)
                @if (isset($item))
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <span class="product-item">
                            @if (isset($item['image']))
                                <img src="https://kytutes.com/storage/{{$item['image']}}" class="img-fluid product-thumbnail">
                            @else 
                                <img src="{{asset('notfound.png')}}" class="menu-img img-fluid" alt="">
                            @endif
                            <h3 class="product-title">{{ $item['name'] ?? '' }}</h3>
                            <strong class="product-price">{{ number_format($item['price'] ?? 0, 2, ',', '.') }} kz</strong>
        
                            <span class="icon-cross" wire:click="addToCart('{{ $item['name'] ?? '' }}')">
                                <img src="{{asset('cross.svg')}}" class="img-fluid">
                            </span>
                        </span>
                    </div> 
                @endif
            @endforeach
        @else
            <div class="rounded col-md-12 d-flex justify-content-center align-items-center flex-column mt-5" style="height: 20rem; border: 1px dashed #000;">
                <h5 class="text-muted text-center text-uppercase">A consulta não retornou nenhum resultado</h5>
            </div>
        @endif
    </div>
</div>
</div>