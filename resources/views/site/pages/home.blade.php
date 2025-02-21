@extends('layouts.site.app')
@section('title', 'Pagina Principal')
@section('content')
    @include('site.components.style')
    @include('site.components.navbar')

    @if ($WhatsApp && $WhatsApp->pacote === 'WhatsApp' && $WhatsApp->status === 'premium')
        @include('pacote.whatsaApp')
    @endif

    <!-- Hero Section -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            @foreach ($hero as $item)
                <div class="row justify-content-between gy-5">
                    <div
                        class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                        <h2 data-aos="fade-up">
                            {{ $item->title ?? 'Default Title' }}
                        </h2>
                        <p data-aos="fade-up" data-aos-delay="100">
                            {{ $item->description ?? 'Default Description' }}
                        </p>

                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                        <img src="{{ asset('/image/' . $item->img) ?? 'Default Image' }}" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="300">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container-fluid px-3 px-md-3 px-lg-4" data-aos="fade-up">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="col-sm-12 section-header d-flex justify-content-md-start justify-content-sm-center">
                        <p>Quem Somos</p>
                    </div>
                    <div class="row gy-4">
                        <div class="col-lg-7 position-relative about-img"
                            style="background-image: url({{ isset($fundoAbout->image) ? asset('storage/' . $fundoAbout->image) : 'none' }}); background-repeat: no-repeat;  background-size: cover;"
                            id="about-img" data-aos="fade-up" data-aos-delay="150">

                        </div>
                        <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($about as $item)
                                <div class="content ps-0 ps-lg-5">
                                    <p>{{ $item->p1 ?? '' }}</p>
 
                                    <p>{{ $item->p2 ?? '' }}</p>
                                    <div class="position-relative mt-4">
                                        <img src="{{ isset($fundo->image) ? "/storage/$fundo->image" : '' }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- Main -->
    <main id="main">
        <!-- Why Us Section -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid px-3 px-md-3 px-lg-4" data-aos="fade-up">
                <div class="row gy-4">
                    @foreach ($info as $item)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="why-box text-dark" style="background: var(--color);">
                                <h3 style="color: var(--letra);">
                                    {{ $item->title ?? 'Default Title' }}
                                </h3>
                                <p style="color: var(--letra);">
                                    {{ $item->description ?? 'Default Description' }}
                                </p>
                            </div>
                        </div><!-- End Why Box -->
                    @endforeach

                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="row gy-4">
                            @foreach ($details as $item)
                                <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                                    <div
                                        class="icon-box d-flex flex-column justify-content-center align-items-center detalhes">
                                        <h4 style="color: var(--color);">
                                            {{ $item->title ?? 'Default Title' }}
                                        </h4>
                                        <p style="color: var(--color);">
                                            {{ $item->description ?? 'Default Description' }}
                                        </p>
                                    </div>
                                </div><!-- End Icon Box -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- Stats Counter Section -->
        <section id="stats-counter" class="stats-counter">
            <div class="container-fluid px-3 px-md-3 px-lg-4" data-aos="zoom-out">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ isset($clients->level) ? $clients->level : '00' }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Clientes</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ isset($product->level) ? $product->level : '00' }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Produtos</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ isset($parceiros->level) ? $parceiros->level : '00' }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Parceiros</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"
                                data-purecounter-end="{{ isset($experiencia->level) ? $experiencia->level : '00' }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Experiencia</p>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
            </div>
        </section>
        <!-- End Stats Counter Section -->

        @include('site.components.contact')
        @include('site.components.footer')
    @endsection
