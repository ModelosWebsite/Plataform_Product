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
  <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '4236234226612214');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=4236234226612214&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

  <!-- Template Main CSS File -->
  <link href="{{ asset('theme/default/css/app.css') }}" rel="stylesheet">
  @livewireStyles
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
  {{-- Caso necessário, descomente cookies.js depois de corrigir declarações duplicadas de Cookies --}}
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>