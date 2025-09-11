<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>xZero | Website Clássico</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800 font-sans">
  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full bg-blue-900/90 backdrop-blur-md text-white shadow z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

      <!-- Logo -->
      <h1 class="text-2xl font-bold">Website Clássico</h1>

      <!-- Menu desktop -->
      <nav class="hidden md:flex space-x-6">
        <a href="#inicio" class="hover:text-blue-300">Principal</a>
        <a href="#webproduct" class="hover:text-blue-300">Produto</a>
        <a href="#sobre" class="hover:text-blue-300">Sobre</a>
        <a href="#contact" class="hover:text-blue-300">Contato</a>
      </nav>

      <!-- Botão CTA (desktop) -->
      <a href="{{route('site.subscription')}}"
        class="hidden md:inline-block px-4 py-2 bg-blue-600 rounded-lg font-medium hover:bg-blue-500 transition">
        Adira já gratuitamente
      </a>

      <!-- Botão Hamburguer (mobile) -->
      <button id="menu-btn" class="md:hidden flex flex-col gap-1.5">
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
        <span class="w-6 h-0.5 bg-white"></span>
      </button>
    </div>

    <!-- Menu Mobile -->
    <div id="menu-mobile" class="hidden md:hidden bg-blue-950 px-6 py-6 space-y-4 flex flex-col text-white">
      <a href="#inicio" class="hover:text-blue-300">Principal</a>
      <a href="#produto" class="hover:text-blue-300">Produto</a>
      <a href="#sobre" class="hover:text-blue-300">Sobre</a>
      <a href="#contato" class="hover:text-blue-300">Contato</a>
      <a href="{{route('site.subscription')}}"
        class="block px-4 py-2 bg-blue-600 rounded-lg text-center font-medium hover:bg-blue-500 transition">
        Adira já gratuitamente
      </a>
    </div>
  </header>

  <!-- Hero -->
  <section id="inicio" class="min-h-screen flex items-center px-6 pt-32 bg-cover bg-center text-white"
    style="background-image: url('{{ asset('image/bg-hero.png') }}');">

    <div class="ml-auto max-w-2xl text-right bg-black/50 p-7 rounded-2xl">
      <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
        Adira a um site profissional <span class="text-blue-300">gratuito</span> com o xZero
      </h1>
      <p class="text-lg md:text-xl text-gray-200 mb-8">
        O caminho mais rápido para digitalizar o seu negócio.
      </p>
      <a href="{{route('site.subscription')}}"
        class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition">
        Adira já gratuitamente
      </a>
    </div>
  </section>

  <!-- Como Aderir -->
  <section class="py-20 px-6 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center mb-12">
      <h2 class="text-3xl font-bold mb-4">Como aderir gratuitamente ao Website Clássico?</h2>
      <p class="text-gray-600">Ser digital é ser global!</p>
    </div>
    <div class="max-w-7xl mt-12 mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
      <!-- Lado esquerdo -->
      <div class="bg-blue-900 text-white p-8 flex flex-col justify-center rounded-lg shadow-lg">
        <h2 class="text-2xl font-extrabold mb-4 leading-tight">
          Como aderir já gratuitamente ao <br />website clássico xZero?
        </h2>
        <p class="text-xl mt-2">Ser digital é ser global!</p>
      </div>

      <!-- Cartão 1 -->
      <div class="bg-white p-8 rounded-lg shadow-md flex flex-col justify-between">
        <div class="mb-2">
          <h3 class="text-blue-900 font-semibold text-lg mb-2">1. Crie sua conta</h3>
          <p class="text-blue-900 text-sm">
            Cadastre-se e escolha um modelo pronto.
          </p>
        </div>
        <a href="{{ route('site.subscription') }}" 
          class="flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-medium text-base px-6 py-2 rounded-md transition text-center">
          Adira já gratuitamente
        </a>
      </div>

      <!-- Cartão 2 -->
      <div class="bg-white p-8 rounded-lg shadow-md flex flex-col justify-between">
        <div class="mb-2">
          <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">
            2. Personalize
          </h3>
          <p class="text-blue-900 text-sm text-center">
            Ajuste cores, logotipo e conteúdos ao seu estilo.
          </p>
        </div>
        <a href="{{ route('site.subscription') }}" 
          class="flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-medium text-base px-6 py-2 rounded-md transition text-center">
          Adira já gratuitamente
        </a>
      </div>

      <!-- Cartão 3 -->
      <div class="bg-white p-8 rounded-lg shadow-md flex flex-col justify-between">
        <div class="mb-2">
          <h3 class="text-blue-900 font-semibold text-lg mb-2 text-center">
            3. Publique e cresça
          </h3>
          <p class="text-blue-900 text-sm text-center">
            Ative sua loja online com SEO integrado.
          </p>
        </div>
        <a href="{{ route('site.subscription') }}" 
          class="flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-medium text-base px-6 py-2 rounded-md transition text-center">
          Adira já gratuitamente
        </a>
      </div>
    </div>
  </section>

  <section id="webproduct" class="flex flex-col items-center justify-center text-center px-4 py-8">
    <!-- Título -->
    <div class="text-center mb-12">
      <h3 class="text-3xl font-bold text-gray-900">Produto xZero</h3>
      <div class="w-20 h-1 bg-blue-600 mx-auto mt-4 rounded"></div>
    </div>

    <!-- Ícone dentro do círculo -->
    <div class="w-32 h-32 rounded-full border-8 border-gray-900 flex items-center justify-center mb-6">
      <!-- Ícone simples SVG -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-900" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6M4 6h16v12H4z" />
      </svg>
    </div>

    <!-- Subtítulo -->
    <h3 class="text-xl font-bold text-gray-900 mb-4 uppercase">
      Website Clássico
    </h3>

    <!-- Descrição -->
    <p class="max-w-xl text-gray-700 text-base md:text-lg leading-relaxed mb-8">
      Perfeito para quem quer marcar a sua presença online e profissionalizar o seu ofício na internet. Empresas,
      freelancers, criativos
    </p>

    <!-- Botão -->
    <a href="{{ route("site.subscription") }}" class="bg-blue-700 hover:bg-blue-800 text-white font-medium text-base px-6 py-3 rounded-md transition">
      Adira já gratuitamente
    </a>
  </section>

  <!-- ======= Benefícios Website Clássico ======= -->
  <section id="beneficios" class="py-20 px-6 bg-white">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">

      <!-- Mockup Esquerda -->
      <div class="flex justify-center">
        <img src="{{ asset('image/laptop-mockup.png') }}" alt="Mockup Website Clássico"
          class="w-full max-w-md md:max-w-lg">
      </div>

      <!-- Texto Direita -->
      <div>
        <h2 class="text-3xl font-bold mb-6">
          Benefícios Do Pacote Website Clássico
        </h2>

        <ul class="space-y-4 text-gray-700 text-lg">
          <li class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Website com modelo clássico xZero
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Painel para controlar o conteúdo do seu website clássico
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Website no ar dentro de 10 minutos
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Hospedagem complementar (permite clientes acederem ao seu site)
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Sub-domínio xZero (caso não precise ou queira um domínio próprio)
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Project Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

      <!-- Título -->
      <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
          Explore os Nossos Temas Clássicos
        </h1>
        <p class="mt-3 text-gray-600">
          Veja abaixo as opções disponíveis e escolha o visual ideal para o seu site.
        </p>
      </div>

      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Card 1 -->
        <div class="relative h-80 [perspective:1000px] bg-blue-50">
          <div
            class="relative w-full h-full transition-transform duration-700 [transform-style:preserve-3d] hover:[transform:rotateY(180deg)] rounded-xl shadow-lg">

            <!-- Frente -->
            <div class="absolute inset-0 [backface-visibility:hidden] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/bg-web.png') }}" alt="Modelo Portfolio" class="w-full h-64 object-cover">
                <div class="p-4 text-center">
                  <h3 class="text-xl font-semibold text-gray-800">Portfolio</h3>
                </div>
              </a>
            </div>

            <!-- Verso -->
            <div
              class="absolute inset-0 [backface-visibility:hidden] [transform:rotateY(180deg)] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/modelos/1.jpg') }}" alt="Preview Portfolio"
                  class="w-full h-full object-cover">
              </a>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="relative h-80 [perspective:1000px]">
          <div
            class="relative w-full h-full transition-transform duration-700 [transform-style:preserve-3d] hover:[transform:rotateY(180deg)] rounded-xl shadow-lg">

            <!-- Frente -->
            <div class="absolute inset-0 [backface-visibility:hidden] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/themes/bg-service.png') }}" alt="Modelo Serviço" class="w-full h-64 object-cover">
                <div class="p-4 text-center">
                  <h3 class="text-xl font-semibold text-gray-800">Serviço</h3>
                </div>
              </a>
            </div>

            <!-- Verso -->
            <div
              class="absolute inset-0 [backface-visibility:hidden] [transform:rotateY(180deg)] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/modelos/2.jpg') }}" alt="Preview Serviço" class="w-full h-full object-cover">
              </a>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="relative h-80 [perspective:1000px]">
          <div
            class="relative w-full h-full transition-transform duration-700 [transform-style:preserve-3d] hover:[transform:rotateY(180deg)] rounded-xl shadow-lg">

            <!-- Frente -->
            <div class="absolute inset-0 [backface-visibility:hidden] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/themes/bg-product.png') }}" alt="Modelo Produto"
                  class="w-full h-64 object-cover">
                <div class="p-4 text-center">
                  <h3 class="text-xl font-semibold text-gray-800">Produto</h3>
                </div>
              </a>
            </div>

            <!-- Verso -->
            <div
              class="absolute inset-0 [backface-visibility:hidden] [transform:rotateY(180deg)] bg-white rounded-xl overflow-hidden">
              <a href="#" class="block h-full">
                <img src="{{ asset('image/modelos/3.jpg') }}" alt="Preview Produto" class="w-full h-full object-cover">
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Porquê ter um website -->
  <section class="py-20 px-6 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-3xl font-bold mb-6">Porquê ter um website?</h2>
        <ul class="space-y-3 text-lg">
          <li>✔ Canal de vendas aberto 24h/dia</li>
          <li>✔ Maior visibilidade a potenciais clientes</li>
          <li>✔ Expansão do mercado de atuação</li>
          <li>✔ Promoção focada em produtos e serviços</li>
          <li>✔ Diferenciação da concorrência</li>
          <li>✔ Mais credibilidade para sua marca</li>
        </ul>
      </div>
      <div class="flex justify-center">
        <img src="{{ asset('image/themes/demo.svg') }}" alt="Website Responsivo" class="rounded-xl">
      </div>
    </div>
  </section>

  <!-- ======= Seção Sobre ======= -->
  <section id="sobre" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

      <!-- Coluna Esquerda: Texto -->
      <div>
        <h2 class="text-4xl font-extrabold text-gray-900 mb-6">
          Sobre o <span class="text-blue-600">Website Clássico</span>
        </h2>
        <p class="text-lg text-gray-600 leading-relaxed mb-6">
          O <span class="font-semibold text-blue-600">Website Clássico</span> nasceu com o propósito
          de democratizar a presença digital.
          Criamos websites profissionais, rápidos e elegantes,
          que ajudam empresas, empreendedores e criativos a
          destacarem-se online com sofisticação e impacto.
        </p>
        <p class="text-lg text-gray-600 leading-relaxed mb-8">
          Cada projeto é desenvolvido com cuidado, garantindo
          design moderno, performance otimizada e a melhor
          experiência para os seus clientes.
        </p>

        <a href="{{route('site.subscription')}}"
          class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-500 transition">
          Adira já gratuitamente
        </a>
      </div>

      <!-- Coluna Direita: Imagens Elegantes -->
      <div class="grid grid-cols-2 gap-6">
        <img src="{{ asset('image/bg-web.png') }}" alt="Equipe xZero"
          class="w-full h-64 object-cover rounded-2xl transform transition">
        <img src="{{ asset('image/bg-hero.png') }}" alt="Trabalho Criativo"
          class="w-full h-64 object-cover rounded-2xl transform transition">
        <img src="{{ asset('image/themes/designer.png') }}" alt="Tecnologia e Inovação"
          class="w-full h-64 object-cover rounded-2xl transform transition col-span-2">
      </div>

    </div>
  </section>

  <footer class="bg-[#141a64] text-white py-8 px-6" id="contact">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">

      <!-- Endereço -->
      <div>
        <h3 class="font-semibold text-lg flex items-center gap-2">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 10s8-4.5 8-10c0-4.418-3.582-8-8-8s-8 3.582-8 8c0 5.5 8 10 8 10z" />
          </svg>
          Endereço
        </h3>
        <p class="mt-2">Talatona, Condomínio TSE, Vila 17</p>
        <div class="mt-2 text-sm text-gray-300">
          <a href="https://www.pachecobarroso.com/pb-privacy-policy" target="_blank" class="hover:underline">Políticas de Privacidade</a> |
          <a href="https://www.pachecobarroso.com/pb-terms-conditions" target="_blank" class="hover:underline">Termos e Condições</a>
        </div>
      </div>

      <!-- Reservas -->
      <div>
        <h3 class="font-semibold text-lg flex items-center gap-2">
          Contactos
        </h3>
        <p class="mt-2"><strong>Telefone:</strong> +244 947 211 025</p>
        <p><strong>Email:</strong> web@on.xzero.live</p>
      </div>

      <!-- Horário -->
      <div>
        <h3 class="font-semibold text-lg flex items-center gap-2">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
          </svg>
          Hora de Funcionamento
        </h3>
        <p class="mt-2 font-semibold">Segunda à Sexta - Das 07h - 16h</p>
      </div>

      <!-- Redes sociais -->
      <div>
        <h3 class="font-semibold text-lg mb-2">Siga-nos</h3>
        <a href="#"
          class="inline-block p-2 border border-gray-400 rounded-full hover:bg-white hover:text-[#141a64] transition">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.3 2.3.6.6.3 1.1.8 1.4 1.4.3.5.5 1.1.6 2.3.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.3 1.8-.6 2.3-.3.6-.8 1.1-1.4 1.4-.5.3-1.1.5-2.3.6-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.8-.3-2.3-.6-.6-.3-1.1-.8-1.4-1.4-.3-.5-.5-1.1-.6-2.3C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.3-1.8.6-2.3.3-.6.8-1.1 1.4-1.4.5-.3 1.1-.5 2.3-.6C8.4 2.2 8.8 2.2 12 2.2zm0 1.8c-3.1 0-3.4 0-4.6.1-1.1.1-1.7.2-2.1.4-.5.2-.8.5-1 .9-.2.4-.3 1-.4 2.1-.1 1.2-.1 1.5-.1 4.6s0 3.4.1 4.6c.1 1.1.2 1.7.4 2.1.2.5.5.8.9 1 .4.2 1 .3 2.1.4 1.2.1 1.5.1 4.6.1s3.4 0 4.6-.1c1.1-.1 1.7-.2 2.1-.4.5-.2.8-.5 1-.9.2-.4.3-1 .4-2.1.1-1.2.1-1.5.1-4.6s0-3.4-.1-4.6c-.1-1.1-.2-1.7-.4-2.1-.2-.5-.5-.8-.9-1-.4-.2-1-.3-2.1-.4-1.2-.1-1.5-.1-4.6-.1zm0 3.6a4.2 4.2 0 1 1 0 8.4 4.2 4.2 0 0 1 0-8.4zm0 1.8a2.4 2.4 0 1 0 0 4.8 2.4 2.4 0 0 0 0-4.8zm4.8-.9a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
          </svg>
        </a>
      </div>
    </div>

    <hr class="my-6 border-gray-600" />

    <!-- Copyright -->
    <div class="text-center text-sm text-gray-300">
      © Copyright {{ date('Y') }} <span class="font-semibold text-white">xZero</span>. Todos direitos reservados
    </div>
  </footer>

  <!-- Script para abrir/fechar menu -->
  <script>
    const menuBtn = document.getElementById("menu-btn");
    const menuMobile = document.getElementById("menu-mobile");

    menuBtn.addEventListener("click", () => {
      menuMobile.classList.toggle("hidden");
      menuMobile.classList.toggle("flex");
    });
  </script>

</body>
</html>