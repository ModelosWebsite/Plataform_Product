<!-- Header -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container-fluid px-3 px-md-3 px-lg-4 d-flex align-items-center justify-content-between">

    <!-- Logo -->
    <a href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken]) }}" class="logo d-flex align-items-center me-auto me-lg-0">
      {{-- <img src="{{ asset('site/assets/img/logo.png') }}" alt="Logo" style="font-size: 2rem;"> --}}
      <h1>{{ $companyName->companyname }}<span>.</span></h1>
    </a>

    <!-- Navbar -->
    <nav id="navbar" class="navbar">
      <ul>
        <li>
          <a href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken]) }}#hero">
            Principal
          </a>
        </li>
        <li>
          <a href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken]) }}#about">
            Sobre
          </a>
        </li>
        <li>
          <a href="{{ route('plataforma.produto.shopping', ['company' => $companyName->companyhashtoken]) }}">
            Loja
          </a>
        </li>
        <li>
          <a href="{{ route('plataforma.produto.delivery.status', ['company' => $companyName->companyhashtoken]) }}">
            Encontrar Encomenda
          </a>
        </li>
        <li>
          <a href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken]) }}#contact">
            Contacto
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Navbar -->

    <!-- Mobile Nav Toggle -->
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list text-white"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x text-white"></i>

  </div>
</header>
<!-- End Header -->

<style>
  .mobile-nav-active {
    background-color: #fff;
  }
</style>