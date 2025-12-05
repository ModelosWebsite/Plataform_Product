@extends('layouts.site.app')
@section('title', 'Marcações')
@section('content')
    @include('site.components.style')
    @include('site.components.navbar')
    @include("sweetalert::alert")

    {{-- Start Import Component livewire loja online  --}}
    <main style="margin-top: 10rem;">
        <livewire:site.appointment-componet>
    </main>

    {{-- End Import Component livewire loja online --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endsection