<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site Indisponível</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonte futurista -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-950 via-indigo-950 to-black 
             flex items-center justify-center px-4 overflow-hidden">

    <!-- Background glow -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-600/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Card principal -->
    <main class="relative z-10 w-full max-w-2xl">
        <section class="relative rounded-2xl border border-white/10 
                        bg-white/5 backdrop-blur-xl p-8 md:p-12 
                        shadow-2xl text-center">

            <!-- Neon border -->
            <div class="absolute -inset-0.5 rounded-2xl bg-gradient-to-r 
                        from-indigo-500 via-purple-500 to-cyan-500 
                        opacity-20 blur"></div>

            <!-- Conteúdo -->
            <div class="relative z-10">

                <!-- Ícone -->
                <div class="mx-auto mb-6 flex h-24 w-24 items-center justify-center 
                            rounded-full bg-gradient-to-br from-indigo-500 to-cyan-500 
                            shadow-lg shadow-cyan-500/40">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.4 12.8A1.5 1.5 0 004.2 19h15.6a1.5 1.5 0 001.3-2.34l-7.4-12.8a1.5 1.5 0 00-2.6 0z"/>
                    </svg>
                </div>

                <!-- Título -->
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-4
                           bg-gradient-to-r from-indigo-400 via-purple-400 to-cyan-400
                           bg-clip-text text-transparent">
                    Site Temporariamente Indisponível
                </h1>

                <!-- Texto -->
                <p class="text-slate-300 text-base md:text-lg leading-relaxed max-w-xl mx-auto">
                    Estamos a realizar melhorias e manutenções no sistema.
                    Em breve, o acesso será restabelecido com uma experiência ainda melhor.
                </p>

                <!-- Divider -->
                <div class="my-8 flex items-center justify-center gap-3">
                    <span class="h-px w-16 bg-gradient-to-r from-transparent via-indigo-500 to-transparent"></span>
                    <span class="text-xs uppercase tracking-widest text-indigo-400">status</span>
                    <span class="h-px w-16 bg-gradient-to-r from-transparent via-cyan-500 to-transparent"></span>
                </div>

                <!-- Status badge -->
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full 
                                 bg-gradient-to-r from-indigo-500 to-cyan-500
                                 px-6 py-2 text-sm font-semibold text-white
                                 shadow-lg shadow-cyan-500/30">
                        <span class="h-2 w-2 rounded-full bg-white animate-pulse"></span>
                        Manutenção em andamento
                    </span>
                </div>

            </div>
        </section>
    </main>

</body>
</html>