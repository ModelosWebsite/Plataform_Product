  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid px-3 px-md-3 px-lg-4 d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken]) }}">{{ $companyName->companyname ?? ""}}</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#home">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#work">Trabalhos</a></li>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#shop">Loja</a></li>
          <li><a class="nav-link scrollto" href="{{ route('plataforma.produto.index', ['company' => $companyName->companyhashtoken ?? ""]) }}#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header><!-- End Header -->
<!-- ======= End Header ======= -->