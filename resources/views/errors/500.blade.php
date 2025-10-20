<!doctype html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro 500 - Sistema Futurista</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0a0a1a;
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
      overflow: hidden;
      position: relative;
    }

    /* partículas futuristas */
    .stars {
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('https://www.transparenttextures.com/patterns/stardust.png');
      animation: drift 25s linear infinite;
      opacity: 0.25;
    }
    @keyframes drift {
      from { transform: translateY(0); }
      to { transform: translateY(-1000px); }
    }

    .glitch {
      font-size: 6rem;
      font-weight: 800;
      position: relative;
      text-shadow: 0 0 20px rgba(139,92,246,0.8);
      animation: flicker 2.5s infinite;
    }
    
    @keyframes flicker {
      0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
      20%, 24%, 55% { opacity: 0.4; }
    }

    .card {
      text-align: center;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(139,92,246,0.2);
      backdrop-filter: blur(12px);
      padding: 3rem;
      border-radius: 1.5rem;
      box-shadow: 0 0 40px rgba(139,92,246,0.3);
      position: relative;
      z-index: 5;
    }
  </style>
</head>
<body>
  <div class="stars"></div>
  <div class="card">
    <div class="glitch">500</div>
    <h2 class="text-2xl mt-4 text-indigo-300 font-bold">Ocorreu um problema no servidor</h2>
    <div class="text-center py-5">
    <p class="mt-3 text-gray-300 text-sm max-w-md mx-auto">
        Pedimos desculpas pelo inconveniente. Ocorreu um erro inesperado em nossos sistemas e os processos foram
        interrompidos para evitar falhas maiores. Nossa equipa técnica já foi notificada e está a analisar o incidente.
    </p>
    <p class="mt-4 text-xs text-indigo-400 italic">
        Mensagem do sistema: "Fluxo corrompido na camada lógica. Protocolos de recuperação em andamento."
    </p>
    <p class="mt-4 text-sm text-gray-400">
        Se o problema persistir, entre em contato com a nossa equipa de suporte através do e-mail:
        <a href="mailto:apoioaocliente@xzero.live" class="text-indigo-400 underline hover:text-indigo-300">
            apoioaocliente@xzero.live
        </a>
    </p>
    <a href="/" class="mt-6 inline-block px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 transition shadow-lg text-white">
        Voltar
    </a>
</div>

  </div>
</body>
</html>
