<div class="hero_area" id="home" style="{{(Route::Current()->getName() == 'plataforma.produto.index') ? 'min-height: 100vh !important;':'min-height: 0vh !important;'}}">
    <!-- header section strats -->
    <header class="header_section fixed-top">
      <div class="header_bottom">
        <div class="container-fluid px-3 px-md-3 px-lg-4">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route("plataforma.produto.index", ["company" => $companyName->companyhashtoken]) }}">
              {{-- @if ($companyName->logotipo != null)
                <img width="50rem" src="{{asset("image/$data->logotipo")}}" alt="">
              @else --}}
                <span> {{isset($companyName->companyname) ? $companyName->companyname : ""}}</span>
              {{-- @endif --}}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route("plataforma.produto.index", ["company" => $companyName->companyhashtoken]) }}#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("plataforma.produto.index", ["company" => $companyName->companyhashtoken]) }}#about"> Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("plataforma.produto.index", ["company" => $companyName->companyhashtoken]) }}#service">Serviços</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("plataforma.produto.shopping", ["company" => $companyName->companyhashtoken]) }}">Loja</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('plataforma.produto.delivery.status', ['company' => $companyName->companyhashtoken]) }}">Encomenda</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route("plataforma.produto.index", ["company" => $companyName->companyhashtoken]) }}#contact">Contacto </a>
                </li>
              </ul>
            </div>

          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->

    @if ((Route::Current()->getName() == 'plataforma.produto.index'))
      @include("themes.service.component.slider")
    @endif
    
    <!-- end slider section -->
  </div>