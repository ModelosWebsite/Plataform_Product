@extends("themes.service.layout.app")
@section("title", "Pagina Inicial do site")
@section("content")
@include("themes.service.component.color")

  <!-- about section -->
  <section class="about_section layout_padding-bottom mt-5" id="about">
    <div class="container-fluid px-3 px-md-3 px-lg-4">
      @foreach ($about as $item)
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                  Sobre a Empresa
              </h2>
            </div>
            <p>{{ $item->p1 }}</p>
            <p>{{ $item->p2 }}</p>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{ Storage::url("arquivos/background/". $item->image) }}" alt="">
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- end about section -->

  <!-- End Counter Section -->
  <div class="mt-4 mb-4">
      <livewire:announcements.rectangle />
  </div>

  <!-- service section -->
  <section class="service_section layout_padding" id="service">
    <div class="service_container">
      <div class="container-fluid px-3 px-md-3 px-lg-4">
        <div class="heading_container">
          <h2>
             Nossos <span>Serviços</span>
          </h2>
        </div>
        <div class="row">
          @foreach ($services as $service)
            <div class="col-md-6">
                <div class="box">
                <div class="img-box">
                    <img src="{{asset("theme/service/site/images/service.svg")}}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                    {{$service->title}}
                    </h5>
                    <p>
                    {{$service->description}}
                    </p>
                </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- end service section -->
  <!-- track section -->
  <section class="track_section layout_padding" id="start">
    <div class="track_bg_box" style="object-fit: cover;">
      <img src="{{ Storage::url('arquivos/background/' . ($start->image ?? '')) }}" alt="">
    </div>
    <div class="container-fluid px-3 px-md-3 px-lg-4">
      <div class="row">
        @foreach ($info as $detail)  
            <div class="col-md-6">
                <div class="heading_container">
                    <h2>{{$detail->title ?? ""}} </h2>
                </div>
                <p>{{$detail->description ?? ""}}</p>
            </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- end track section -->

  <div class="mt-4 mb-4">
      <livewire:announcements.rectangle />
  </div>

  <!-- info section -->
  <section class="info_section layout_padding2" id="bgfooter">
    <div class="container-fluid px-3 px-md-3 px-lg-4">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Contactos
            </h4>
            @foreach ($contacts as $contact)
            <div class="contact_link_box">
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  {{$contact->endereco}}
                </span>
              </p>
              <p>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  +244 {{$contact->telefone}}
                </span>
              </p>
              <p>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  {{$contact->email}}
                </span>
              </p>
            </div>
            @endforeach

          </div>
          {{-- <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div> --}}
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            @foreach ($hero as $item)
              <p>{{$item->title ?? ""}}</p>
            @endforeach
            <a type="button" class="text-white" data-toggle="modal" data-target="#privacity">
              Politicas de Privacidade |  
            </a>
            <a type="button" class="text-white" data-toggle="modal" data-target="#conditions">
              Termos e Condições  
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <style>
              #infolinks a:hover{
                color: #fff;
              }
            </style>
            <div class="info_links" id="infolinks">
              <a class="link" href="#home">
                Home
              </a>
              <a class="link" href="#about">
                Sobre
              </a>
              <a class="link" href="#service">
                Serviços
              </a>
              <a class="link" href="#bgfooter">
                Contactos
              </a>
              <a class="link" target="_blank" href="{{ route('plataform.product.login.view') }}">
                Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    @include('pacote.whatsapp')
    @include("site.rules.privacy")
    @include("site.rules.conditions")
  <!-- end info section -->
@endsection