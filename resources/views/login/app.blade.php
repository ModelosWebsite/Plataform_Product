<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-indigo-900 via-purple-900 to-blue-900 flex items-center justify-center p-6">

  @include("sweetalert::alert")

  <div class="w-full max-w-md">
    <div class="bg-gray-900 text-gray-200 rounded-2xl shadow-xl p-8">
      
      <!-- Título -->
      <h2 class="text-2xl font-bold text-center mb-6">Início de sessão</h2>
      
      <!-- Form -->
      <form action="{{route('plataform.product.login')}}" method="post" class="space-y-5">
        @csrf
        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium mb-1">Email</label>
          <input id="email" name="email" type="email" required 
            class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium mb-1">Password</label>
          <input id="password" name="password" type="password" required 
            class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Botão Login -->
        <div class="text-center">
          <button type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 px-4 py-3 rounded-lg font-semibold shadow-md transition">
            Login
          </button>
        </div>
      </form>

      <!-- Footer -->
      <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
        <a href="{{route('auth.reset.password')}}" 
           class="w-full sm:w-auto text-center border border-gray-700 hover:border-blue-500 px-4 py-2 rounded-lg font-medium transition">
           Recuperar Senha
        </a>
        <a href="{{route('site.subscription')}}" 
           class="w-full sm:w-auto text-center border border-gray-700 hover:border-blue-500 px-4 py-2 rounded-lg font-medium transition">
           Criar Website
        </a>
      </div>

    </div>
  </div>

</body>
</html>
