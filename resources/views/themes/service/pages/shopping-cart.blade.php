@extends("themes.service.layout.app")
@section("title", "Portfolio Site")
@section("content")
@include("themes.service.component.navbar")
@include("themes.service.component.color")
@include("sweetalert::alert")
    {{-- Start Import Component livewire loja online  --}}
    <main style="margin-top: 9rem;">
        <livewire:site.shoppingcart />
    </main>
    {{-- End Import Component livewire loja online --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
@endsection