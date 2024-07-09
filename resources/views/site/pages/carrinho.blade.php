@extends('layouts.site.app')
@section('title', 'Carrinho de Compra')
@section('content')
@include('site.components.style')
@include('site.components.navbar')
@include("sweetalert::alert")

    {{-- Start Import Component livewire loja online  --}}
    <main style="margin-top: 5rem;">
        @livewire("site.shoppingcart")
    </main>
    {{-- End Import Component livewire loja online --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
@endsection