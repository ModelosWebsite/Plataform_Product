<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" />
      <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .gradient-custom {
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>

      <!-- Loader -->
  <div id="loader" class="fixed inset-0 flex items-center justify-center bg-white z-50">
    <div class="flex flex-col items-center space-y-4">
      <i class="fa-solid fa-spinner fa-spin fa-4x text-blue-600"></i>
      <span class="text-xl text-gray-700 font-semibold">Carregando...</span>
    </div>
  </div>

  <script>
    // Esconde o loader quando a página terminar de carregar
    window.addEventListener("load", function() {
      const loader = document.getElementById("loader");
      const content = document.getElementById("content");

      loader.classList.add("opacity-0", "transition", "duration-700");

      setTimeout(() => {
        loader.style.display = "none";
        content.classList.remove("hidden");
      }, 700); // tempo da transição
    });
  </script>

    {{$slot}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    @livewireScripts
    <x-livewire-alert::scripts />
    
</body>
</html>