<!DOCTYPE html>
<html lang="pt-ao">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield("title")</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>

<body>

{{$slot}}
  <!-- Vendor JS Files -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  @livewireScripts
  <x-livewire-alert::scripts />
</body>
</html>