<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="w-full min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-fixed" style="background-image: url('{{ asset('bg-web.svg') }}');">
  
  @include("sweetalert::alert")  
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

<section class="w-full max-w-md bg-white/20 border border-white/40 shadow-md rounded-2xl p-8 backdrop-blur-md">
    
    <!-- Logotipo -->
    <div class="flex justify-center mb-3">
        <img src="{{ asset('xzero_platform.svg') }}" alt="Logo da Plataforma" class="h-16">
    </div>

    <h2 class="text-2xl text-white font-bold text-center mb-6">Início de sessão</h2>

    <!-- Tabs -->
    <div class="flex w-full rounded-lg overflow-hidden mb-6">
        <a href="https://xzero.live/login" target="_blank" class="flex-1 px-4 py-2 font-semibold text-center bg-gray-300 text-black hover:bg-gray-400">
            Administrativo
        </a>
        <a href="#" class="flex-1 px-4 py-2 font-semibold text-center bg-blue-600 text-white">
            Website
        </a>
        <a href="https://kytutes.com/auth/login" target="_blank" class="flex-1 px-4 py-2 font-semibold text-center bg-gray-300 text-black hover:bg-gray-400">
            POS
        </a>
    </div>

    <!-- Formulário -->
    <form action="{{route('plataform.product.login')}}" method="post" class="flex flex-col gap-5">
        @csrf
        <input class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" name='email' type="email" placeholder="E-mail" required />
        <input class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" name='password' type="password" placeholder="Senha de Acesso" required />
        <input id="phoneInput" min="1" class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('phone') }}" type="number" placeholder="Número de telefone" />

        <div class="flex justify-center">
            <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition">
                <i class="fas fa-sign-in-alt"></i>
                Entrar
            </button>
        </div>
    </form>

    <!-- Links abaixo do formulário -->
    <div class="mt-6 text-center space-y-2">
        <a href="{{ route('auth.reset.password') }}" class="text-white text-lg hover:underline">Esqueceu a sua senha?</a><br>
        <a href="{{ route('site.subscription') }}" class="text-white text-lg hover:underline">Criar Conta</a><br>
        <a href="https://xzero.live" class="text-white text-lg hover:underline">Voltar ao Site</a>
    </div>
</section>


</body>
</html>
