<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>xZero | Website Clássico</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- Secção Única -->
  <section class="relative min-h-screen flex items-center justify-center bg-cover bg-center text-white" 
    style="background-image: url('{{ asset('image/bg-hero.png') }}');">

    <!-- Overlay escuro -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Conteúdo -->
    <div class="relative z-10 max-w-4xl text-center px-6">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <img src="{{ asset('site/img/logosite.png') }}" alt="Logo" class="h-12">
      </div>

      <!-- Título -->
      <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
        Website Clássico <span class="text-blue-300">xZero</span>
      </h1>

      <!-- Subtítulo -->
      <p class="text-lg md:text-xl text-gray-200 mb-8">
        Crie seu website profissional gratuito, pronto em menos de 10 minutos.
      </p>

      <!-- Botão CTA -->
      <div class="flex justify-center gap-4">
        <a href="{{ route('site.subscription') }}"
          class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition">
          Adere já gratuitamente
        </a>

        <a href="{{ route('plataform.product.login.view') }}"
          class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition">
          Acessar meu painel
        </a>
      </div>

      <!-- Rodapé pequeno -->
      <div class="mt-12 text-sm text-gray-400">
        © {{ date('Y') }} <span class="font-semibold text-white">xZero</span>. Todos os direitos reservados.
      </div>
    </div>
  </section>

</body>
</html>