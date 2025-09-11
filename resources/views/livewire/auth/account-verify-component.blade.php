<div>
    <div class="w-full max-w-md bg-gray-900 text-gray-200 rounded-2xl shadow-xl p-8">
        <!-- Header -->
        <div class="text-center mb-6">
        <h2 class="text-2xl font-bold">Verificação de Conta</h2>
        <p class="text-gray-400 text-sm mt-2">Insira o código de 6 dígitos enviado para o seu email.</p>
        </div>

        <!-- OTP Form -->
        <div class="space-y-6">
            <div class="flex justify-between gap-2">
                <input type="text" maxlength="1" wire:model="one" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="text" maxlength="1" wire:model="two" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="text" maxlength="1" wire:model="three" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="text" maxlength="1" wire:model="four" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="text" maxlength="1" wire:model="five" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                <input type="text" maxlength="1" wire:model="six" class="otp w-12 h-14 text-center text-xl rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Botão Verificar -->
            <button wire:click="verifyAccount" class="w-full py-3 rounded-lg bg-blue-600 hover:bg-blue-700 font-semibold shadow-md transition">
               <i class="fa fa-check"></i> Verificar Conta
            </button>
        </div>

        <!-- Links -->
        <div class="mt-6 text-center space-y-2">
        <p class="text-gray-400 text-sm">Não recebeu o código?</p>
        <button wire:click="resendCode" class="bg-blue-600 text-white-400 p-2 rounded-lg font-medium">
            Reenviar código
        </button>
        </div>
    </div>

  <script>
    const inputs = document.querySelectorAll(".otp");

    inputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
        const value = e.target.value.replace(/[^0-9]/g, ""); // só números
        e.target.value = value;

        if (value && index < inputs.length - 1) {
          inputs[index + 1].focus(); // avança
        }
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !e.target.value && index > 0) {
          inputs[index - 1].focus(); // volta
        }
      });
    });
  </script>
</div>