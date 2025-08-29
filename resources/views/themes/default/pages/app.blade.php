@extends("themes.default.layout.app")
@section("title", "Portfolio Site")
@section("content")
@include("themes.default.components.navbar")
@include("themes.default.components.images")
@include("themes.default.components.color")
<!-- ======= Hero Section ======= -->
<div id="hero" class="hero route bg-image">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
        <div class="table-cell">
            <div class="container">
                @foreach ($hero as $item)
                <h1 class="hero-title mb-4">{{$item->title}}</h1>
                <p class="hero-subtitle"><span class="typed" data-typed-items="{{$item->description}}"></span></p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        @foreach ($hero as $item)
                                            <div class="about-img">
                                                <img style="border-radius: 12rem;width: 13rem; height: 13rem;" src="{{ Storage::url("arquivos/hero/".$item->img) }}" class="img-fluid b-shadow-a" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="skill-mf">
                                        <p class="title-s">Habilidades</p>
                                        @foreach ($skills as $skill)
                                        <span>{{$skill->hability}}</span> <span class="pull-right">{{$skill->level ??
                                            ""}}%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{$skill->level ?? ""}}%;" aria-valuenow="85"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-6 col-md-7">
                                        <div class="about-info">
                                            @foreach ($about as $item)
                                            <p><span class="title-s">Nome: </span> <span>{{$item->nome ?? ""}}</span>
                                            </p>
                                            <p><span class="title-s">Perfil: </span> <span>{{$item->perfil ??
                                                    ""}}</span></p>
                                            @endforeach
                                            
                                            @foreach ($contacts as $contact)
                                                <p><span class="title-s">Email: </span> <span>{{$contact->email ?? ""}}</span></p>
                                                <p><span class="title-s">Tel: </span> <span>+244 {{$contact->telefone ?? ""}}</span></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="about-me pt-4 pt-md-0">
                                    <div class="title-box-2">
                                        <h5 class="title-left">
                                            Sobre
                                        </h5>
                                    </div>
                                    @forelse ($about as $item)
                                        <p class="lead"> {{$item->p1 ?? ""}} </p>
                                        <p class="lead"> {{$item->p2 ?? ""}} </p>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <livewire:announcements.rectangle />

    <!-- ======= Services Section ======= -->
    <section id="services" class="services-mf pt-5 route">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Serviços
                        </h3>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="service-box">
                            <div class="service-ico">
                                <span class="ico-circle"><i class="bi bi-briefcase"></i></span>
                            </div>
                            <div class="service-content">
                                <h2 class="s-title">{{$service->title ?? ""}}</h2>
                                <p class="s-description text-center">
                                    {{$service->description ?? ""}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Counter Section ======= -->
    <div class="section-counter paralax-mf bg-image">
        <div class="overlay-mf"></div>
        <div class="container-fluid px-3 px-md-3 px-lg-4 position-relative">
            <div class="row">
                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="bi bi-check"></i></span>
                        </div>
                        <div class="counter-num">
                            <p data-purecounter-start="0" data-purecounter-end="{{$works->level ?? ""}}"
                                data-purecounter-duration="5" class="counter purecounter"></p>
                            <span class="counter-text">Trabalhos Concluidos</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="bi bi-journal-richtext"></i></span>
                        </div>
                        <div class="counter-num">
                            <p data-purecounter-start="0" data-purecounter-end="{{$experiencia->level ?? ""}}"
                                data-purecounter-duration="5" class="counter purecounter"></p>
                            <span class="counter-text">Anos de Experiência</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="bi bi-people"></i></span>
                        </div>
                        <div class="counter-num">
                            <p data-purecounter-start="0" data-purecounter-end="{{$clients->level ?? ""}}"
                                data-purecounter-duration="5" class="counter purecounter"></p>
                            <span class="counter-text">Total de Clientes</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="bi bi-award"></i></span>
                        </div>
                        <div class="counter-num">
                            <p data-purecounter-start="0" data-purecounter-end="{{$premios->level ?? ""}}"
                                data-purecounter-duration="5" class="counter purecounter"></p>
                            <span class="counter-text">Premios</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Counter Section -->
    <div class="mt-5">
        <livewire:announcements.rectangle />
    </div>

    <!-- ======= Portfolio Section ======= -->
    <section id="work" class="portfolio-mf sect-pt4 route">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Portfolio
                        </h3>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($portfolio as $project)
                <div class="col-md-4">
                    <div class="work-box">
                        <a href="{{Storage::url("arquivos/{$project->image}")}}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox">
                            <div class="work-img">
                                <img src="{{Storage::url("arquivos/{$project->image}")}}" alt="" class="img-fluid">
                            </div>
                        </a>
                        <div class="work-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2 class="w-title">{{$project->title ?? ""}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route imgfooter">
        <div class="overlay-mf"></div>
        <div class="container-fluid px-3 px-md-3 px-lg-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-mf">
                        <div id="contact" class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <h5 class="title-left">
                                            Info.
                                        </h5>
                                    </div>

                                    @foreach ($contacts as $item)
                                    <div class="more-info">
                                        <p class="lead">
                                            {{$item->atendimento ?? ""}}
                                        </p>
                                        <ul class="list-ico">
                                            <li><span class="bi bi-geo-alt"></span>{{$item->endereco ?? ""}}</li>
                                            <li><span class="bi bi-phone"></span>+244 {{$item->telefone ?? ""}}</li>
                                            <li><span class="bi bi-envelope"></span>{{$item->email ?? ""}}</li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <livewire:announcements.square />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main>

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container-fluid px-3 px-md-3 px-lg-4">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <a href="https://fortcodedev.com" target="_blank" class="text-white"><strong>Fort-Code</strong></a>. Direitos autorais reservados</p>
            <!-- Button trigger modal termos de cprivacidades e condições-->
            <a type="button" class="text-white" data-bs-toggle="modal" data-bs-target="#privacity">
              Politicas de Privacidade |  
            </a>
            <a type="button" class="text-white" data-bs-toggle="modal" data-bs-target="#conditions">
              Termos e Condições   |
            </a>
            <a class="text-white" href="{{route('plataform.product.login.view')}}">Login</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

    <!-- End #main -->
    @include('pacote.whatsapp')
    @include("site.rules.privacy")
    @include("site.rules.conditions")
@endsection