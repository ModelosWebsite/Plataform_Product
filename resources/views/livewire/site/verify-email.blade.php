<div>
    <div class="w-full min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-900 via-purple-900 to-blue-900 p-6">
        <div class="max-w-3xl text-center text-white">
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Conta não verificada.</h1>
            
            <p class="text-lg md:text-2xl mb-8 leading-relaxed">
                Por favor, verifique seu email. Foi enviado um email de verificação de 
                <span class="font-semibold">web@on.xzero.live</span>.  
                Vá até sua caixa de entrada e conclua a verificação.  
                Se não encontrar, confira também sua pasta de <span class="underline">spam</span>.
            </p>
            
            <a href="{{route('account.verify')}}" class="inline-block w-40 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 font-semibold shadow-lg transition">
                Verificar Conta agora
            </a>
        </div>
    </div>
</div>