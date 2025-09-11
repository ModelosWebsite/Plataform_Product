<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificação de Conta - OTP</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-900 via-purple-900 to-blue-900 p-6">

    {{ $slot }}
    <!-- Vendor JS Files -->
    @livewireScripts
    <x-livewire-alert::scripts />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>