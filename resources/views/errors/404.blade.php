<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Clássico</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0B0F19] text-gray-200 font-sans">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full bg-gray-900/80 backdrop-blur-md z-50 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
      <h1 class="text-2xl font-bold text-white">Website Clássico</h1>
      <nav class="space-x-6 hidden md:flex">
        <a href="#inicio" class="hover:text-blue-400">Início</a>
        <a href="#beneficios" class="hover:text-blue-400">Benefícios</a>
        <a href="#como" class="hover:text-blue-400">Como Criar</a>
        <a href="#sobre" class="hover:text-blue-400">Sobre</a>
        <a href="#contato" class="hover:text-blue-400">Contato</a>
      </nav>
      <a href="{{route('site.subscription')}}" class="px-5 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-500 transition">
        Criar Website
      </a>
    </div>
  </header>

  <!-- Hero -->
  <section id="inicio" class="min-h-screen flex flex-col justify-center items-center text-center px-6 pt-28 bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900">
    <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
      Seu <span class="text-blue-400">Website Clássico</span> começa aqui
    </h1>
    <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-8">
      Crie sua presença digital de forma rápida, segura e com design moderno. 
      Um modelo elegante, responsivo e pronto para o crescimento do seu negócio.
    </p>
    <div class="flex flex-wrap gap-4 justify-center">
      <a href="{{route('site.subscription')}}" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition">
        Criar Website
      </a>
      <a href="{{route('plataform.product.login.view')}}" class="px-8 py-3 border border-gray-500 text-gray-300 font-semibold rounded-lg hover:bg-gray-800 transition">
        Já tenho conta
      </a>
    </div>
  </section>

  <!-- Benefícios -->
  <section id="beneficios" class="py-20 px-6 bg-gray-950">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Benefícios do Website Clássico</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-900 p-8 rounded-xl shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3">Design Moderno</h3>
          <p class="text-gray-400">Um layout responsivo, elegante e adaptado a qualquer dispositivo.</p>
        </div>
        <div class="bg-gray-900 p-8 rounded-xl shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3">Fácil Personalização</h3>
          <p class="text-gray-400">Altere cores, logotipo e conteúdo de forma simples e rápida.</p>
        </div>
        <div class="bg-gray-900 p-8 rounded-xl shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3">Performance Rápida</h3>
          <p class="text-gray-400">Sites leves, com carregamento otimizado e SEO integrado.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Como Criar -->
  <section id="como" class="relative bg-gradient-to-r from-blue-800 to-indigo-900 py-20 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

      <!-- Coluna Esquerda -->
      <div>
        <h2 class="text-4xl font-extrabold mb-6 leading-tight">Como criar seu Website Clássico</h2>
        <p class="text-lg mb-8 text-gray-200">Siga estes <strong>3 passos simples</strong> e ative seu site ainda hoje.</p>
        <div class="flex flex-wrap gap-4">
          <a href="{{route('site.subscription')}}"
             class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 transition">
            Criar Website
          </a>
          <a href="{{route('plataform.product.login.view')}}"
             class="px-6 py-3 border border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-800 transition">
            Já tenho conta
          </a>
        </div>
      </div>

      <!-- Coluna Direita -->
      <div class="bg-gray-900/70 backdrop-blur-md rounded-2xl p-8 shadow-lg">
        <ol class="space-y-6 text-gray-200 text-lg">
          <li class="flex items-start gap-4">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-600 text-gray-900 font-bold rounded-full">1</span>
            <p><strong>Crie sua conta:</strong> Cadastre-se e escolha um modelo pronto.</p>
          </li>
          <li class="flex items-start gap-4">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-600 text-gray-900 font-bold rounded-full">2</span>
            <p><strong>Personalize:</strong> Ajuste cores, logotipo e conteúdos ao seu estilo.</p>
          </li>
          <li class="flex items-start gap-4">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-600 text-gray-900 font-bold rounded-full">3</span>
            <p><strong>Publique e cresça:</strong> Ative sua loja online com SEO integrado.</p>
          </li>
        </ol>
      </div>
    </div>
  </section>
  <!-- Sobre -->
  <section id="sobre" class="py-20 px-6 bg-gray-950">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-3xl font-bold mb-4">O que é o Website Clássico?</h2>
        <p class="text-lg text-gray-300 mb-6">É um modelo pronto que combina praticidade e sofisticação. Ideal para empresas, profissionais e projetos que precisam de uma presença online forte e imediata.</p>
        <a href="{{route('site.subscription')}}" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold shadow hover:bg-blue-500 transition">Comece Agora</a>
      </div>
      <div>
        <img src="https://source.unsplash.com/600x400/?website,technology" alt="Website clássico" class="rounded-2xl shadow-lg">
      </div>
    </div>
  </section>

  <!-- Contato -->
  <section id="contato" class="py-20 px-6 bg-gray-950">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      
      <div>
        <h2 class="text-3xl font-bold mb-6">Pronto para começar?</h2>
        <p class="text-gray-300 mb-6">Entre em contato e saiba como ativar seu Website Clássico hoje mesmo.</p>
        <ul class="space-y-3 text-gray-400">
          <li>📧 contato@websiteclassico.com</li>
          <li>📞 +244 900 000 000</li>
          <li>🕒 Seg - Sex, 9h às 18h</li>
        </ul>
      </div>

      <form class="bg-gray-900 p-8 rounded-2xl shadow space-y-4">
        <input type="text" placeholder="Seu nome" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <input type="email" placeholder="Seu e-mail" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <textarea rows="4" placeholder="Sua mensagem" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <button class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 transition">Enviar mensagem</button>
      </form>

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-950 text-gray-500 py-8 text-center">
    <p>&copy; 2025 Website Clássico. Todos os direitos reservados.</p>
  </footer>

</body>
</html>
