<div>
    <div class="w-full min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-fixed" 
     style="background-image: url('{{ asset('bg-web.svg') }}');">

    <section class="w-full max-w-md bg-white/20 border border-white/40 shadow-md rounded-2xl p-8 backdrop-blur-md">
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
        <form  class="flex flex-col gap-5">
            <input class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" wire:model='email' value="{{ old('email') }}" type="email" placeholder="E-mail" required />
            <input class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" wire:model='password' value="{{ old('password') }}" type="password" placeholder="Senha de Acesso" required />
            <input id="phoneInput" min="1" class="h-10 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('phone') }}" type="number" placeholder="Número de telefone" />

            <div class="flex justify-center">
                <button wire:click="login" wire:loading.attr="disabled" wire:target="login" type="button" class="w-full flex items-center justify-center gap-2 py-2 rounded-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 transition">
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
</div>
</div>