<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/fevicon.png" type="">

  <title>@yield("title")</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset("theme/service/site/css/bootstrap.css")}}" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- font awesome style -->
  <link href="{{asset("theme/service/site/css/font-awesome.min.css")}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset("theme/service/site/css/style.css")}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset("theme/service/site/css/responsive.css")}}" rel="stylesheet" />
  @livewireStyles
</head>
<body>
  <!-- hero section -->
  @include("themes.service.component.navbar")
  <!-- End hero section -->
  
  <!-- content center section -->
  @yield("content")
  <!-- content center end section -->
  @if ((Route::Current()->getName() == 'plataforma.produto.index'))
    @include("themes.service.component.footer")
  @endif
  <!-- footer section -->
  <!-- footer section -->
  
  <!-- jQery -->
  <script type="text/javascript" src="{{asset("theme/service/site/js/jquery-3.4.1.min.js")}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{asset("theme/service/site/js/bootstrap.js")}}"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="{{asset("theme/service/site/js/custom.js")}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>