@extends('layouts.site.app')
@section('title', 'Calendario de Macações')
@section('content')
    @include('site.components.style')
    @include('site.components.navbar')
    @include("sweetalert::alert")

    {{-- Start Import Component livewire loja online  --}}
    <main style="margin-top: 7rem;">
        <livewire:site.calendar-marking-component>
    </main>

    {{-- End Import Component livewire loja online --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
@endsection