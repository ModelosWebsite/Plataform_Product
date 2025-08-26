<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>

  <!-- Vendor CSS Files -->
  <link href="{{ asset('theme/default/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/default/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/default/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/default/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('theme/default/css/app.css') }}" rel="stylesheet">
  @livewireStyles
</head>

<body>

  @yield('content')

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
            <a class="text-white" href="">Fazer Login</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('theme/default/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('theme/default/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('theme/default/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('theme/default/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('theme/default/vendor/typed.js/typed.umd.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('theme/default/js/main.js') }}"></script>
  {{-- Caso necessário, descomente cookies.js depois de corrigir declarações duplicadas de Cookies --}}
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>