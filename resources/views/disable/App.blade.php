@extends('layouts.site.disable')

@section('title', __('Site Indisponível'))

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light px-3">
    <div class="text-center p-4 p-md-5 w-100" style="max-width: 650px;">
        <!-- Ícone ilustrativo -->
        <div class="mb-4">
            <i class="bi bi-exclamation-triangle text-primary" style="font-size: 6rem;"></i>
        </div>

        <!-- Título -->
        <h1 class="fw-bold text-dark mb-3 fs-2 fs-md-1">
            {{ __('Site Indisponível') }}
        </h1>

        <!-- Mensagem -->
        <p class="fs-6 fs-md-5 text-muted">
            {{ __('No momento, este site encontra-se temporariamente desativado. 
            Estamos a trabalhar para restabelecer o acesso o mais rápido possível.') }}
        </p>

        <!-- Linha decorativa -->
        <div class="mt-4">
            <span class="d-inline-block px-4 px-md-5 py-2 bg-primary rounded-pill text-white fw-semibold shadow-sm">
                {{ __('Agradecemos pela compreensão') }}
            </span>
        </div>
    </div>
</div>

@endsection