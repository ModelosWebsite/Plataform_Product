@extends('layouts.site.app')

@section('title', __('Site Indisponível'))

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center text-uppercase">
            <h1 class="display-1">{{ __('Site Indisponível') }}</h1>
            <p class="h4">{{ __('Clique no botão abaixo para fazer login') }}</p>
            <a href="{{ route('plataform.product.login.view') }}" class="btn btn-primary btn-lg">{{ __('Entrar') }}</a>
        </div>
    </div>
@endsection
