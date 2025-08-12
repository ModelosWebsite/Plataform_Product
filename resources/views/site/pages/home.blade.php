@extends('layouts.site.app')
@section('title', 'Pagina Principal')
@section('content')
    @include('site.components.style')
    @include('site.components.navbar')

    @if ($whatsapp)
        <div>
            <a href="https://wa.me/244{{$phonenumber->telefone ?? ''}}" target="_blank" id="pacote">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg>
            </a>
        </div>

        <style>

            #pacote {
                position: fixed;
                width: 50px;
                height: 50px;
                bottom: 65px;
                right: 18px;
                background-color: #25d366;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 1px 1px 2px #888;
                z-index: 1000;
            }

            #pacote svg{
                margin-top: 0px;
            }
        </style>
    @endif

    <!-- Hero Section -->
    <section id="hero" class="hero d-flex align-items-center section-bg vh-100">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            @foreach ($hero as $item)
                <div class="row justify-content-between gy-5">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                        <h2 data-aos="fade-up">
                            {{ $item->title ?? 'Default Title' }}
                        </h2>
                        <p data-aos="fade-up" data-aos-delay="100">
                            {{ $item->description ?? 'Default Description' }}
                        </p>
                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                        <img src="{{ Storage::url("arquivos/hero/".$item->img) }}" class="img-fluid" alt=""
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
                        <p><span style="color: var(--color);">Quem Somos</span></p>
                    </div>
                    <div class="row gy-4">
                        <div class="col-lg-7 position-relative about-img" id="about-img"></div>
                        <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($about as $item)
                                <div class="content ps-0 ps-lg-5">
                                    <p class="text-dark">{{ $item->p1 ?? '' }}</p>
 
                                    <p class="text-dark">{{ $item->p2 ?? '' }}</p>
                                    <div class="position-relative mt-4">
                                        <img src="{{ isset($fundo->image) ? Storage::url("arquivos/background/".$fundo->image) : '' }}" class="img-fluid" alt="">
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
    
    <div class="mt-3 mb-3">
      @livewire("announcements.rectangle")
    </div>

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
        
    <div class="mt-3 mb-3">
      @livewire("announcements.rectangle")
    </div>


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
            <div class="mt-3 mb-3">
                @livewire("announcements.rectangle")
            </div>
        @include('site.components.footer')
    @endsection