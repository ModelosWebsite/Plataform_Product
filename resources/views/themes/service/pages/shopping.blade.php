@extends("themes.service.layout.app")
@section("title", "Portfolio Site")
@section("content")
@include("themes.service.component.navbar")
@include("themes.service.component.color")

  <section style="margin-top: 8rem">
      <livewire:site.shopping />

    <a href="{{route('produto.shoppingcart', ['company' => $companyName->companyhashtoken])}}" 
            id="cartcout" 
        style="color: #ffffff; background: var(--background); border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; position: fixed; right: 15px; bottom: 65px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"
        class="cartcout relative">
        
        <div style="position: relative;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg>

            <span style="background: red; position: absolute; top: -15px; right: -5px;border-radius: 50%; width: 20px; height: 20px;"
                class="d-flex justify-content-center align-items-center text-xs font-bold leading-none text-white">
                <livewire:site.cart-count />
            </span>
        </div>
    </a>
  </section>
@endsection