<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{asset("site/bootstrap.min.css")}}">
    <style>
        .gradient-custom {
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>

    {{$slot}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    @livewireScripts
    <x-livewire-alert::scripts />
    
</body>
</html>