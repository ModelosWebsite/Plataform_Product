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

  <style>
      /*---------------------------------
      POLITICA DE COOKIES
      ----------------------------------*/
      .wrapper{
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        position: fixed;
        bottom: 30px;
        left: 30px;
        background: #001973;
        max-width: 365px;
        text-align: center;
        padding: 25px 25px 30px 25px;
        border-radius: 10px;
        color: #fff;
        font-family: Arial, Helvetica, sans-serif;
        z-index: 999;
      }


      .wrapper .content{
        margin-top: 10px;
      }

      .content header{
        font-size: 25px;
        font-weight: 600;
      }

      .content p{
        color: #fff;
        margin: 5px 0 20px 0;
      }

      .buttons {
        display: block;
        align-items: center;
        justify-content: center;
      }

      .buttons button{
        padding: 10px 20px;
        background: #001973;
        border: none;
        outline: none;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
      }

      .buttons a{
        color: #fff;
        font-size: 16px;
        border: #fff solid 1px;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
      }

      .buttons .item{
        margin: 0 10px;
        background: #ffffff;
        color: var(--background);
      }
  </style>
<!-- End Meta Pixel Code -->
</head>

<body>

  @yield('content')
  
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
  <script src="{{ asset("js/cookies.js") }}"></script>
  {{-- Caso necessário, descomente cookies.js depois de corrigir declarações duplicadas de Cookies --}}
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>