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
    color: var(--color);
  }
  </style>

    @livewireStyles
</head>

<body>

    @yield("content")

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <div id="preloader"></div>



    <script src="{{asset("js/cookies.js")}}"></script>

    <!-- Vendor JS Files -->
        @livewireScripts
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