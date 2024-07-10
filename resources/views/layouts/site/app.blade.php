<!DOCTYPE html>
<html lang="pt-ao">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>
  <meta content="" name="description">
  <meta content="" name="keywords" class="">

  <link rel="shortcut icon" type="image/png" href="{{asset("site/assets/img/logo.ico")}}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="{{asset("site/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("site/vendor/aos/aos.css")}}" rel="stylesheet">
  <link href="{{asset("site/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
  <link href="{{asset("site/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("site/css/main.css")}}" rel="stylesheet">

  <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:5054711,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>

</head>

<body>

    @yield("content")

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <div id="preloader"></div>


    <!-- Vendor JS Files -->
    <script src="{{asset("site/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("site/vendor/aos/aos.js")}}"></script>
    <script src="{{asset("site/vendor/glightbox/js/glightbox.min.js")}}"></script>
    <script src="{{asset("site/vendor/purecounter/purecounter_vanilla.js")}}"></script>
    <script src="{{asset("site/vendor/swiper/swiper-bundle.min.js")}}"></script>
    <script src="{{asset("site/vendor/php-email-form/validate.js")}}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{asset("site/js/main.js")}}"></script>
  
  </body>
</html>