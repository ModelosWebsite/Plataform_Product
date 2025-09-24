<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-[#6a11cb] to-[#2575fc]">
    <div class="w-full max-w-md">
        <div class="bg-gray-900 text-white rounded-2xl shadow-lg">
            <div class="p-6">
                <h4 class="text-xl font-bold text-center mb-6">Recuperar Senha</h4>

                <form wire:submit.prevent="resetPassword()" class="space-y-4">
                    <div>
                        <label for="typeEmailX" class="block mb-1 text-sm">Email</label>
                        <input wire:model="email" name="email" type="email"
                            class="w-full rounded-md border border-gray-600 bg-gray-800 text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#6a11cb]"
                            required />
                    </div>

                    <div class="flex justify-center gap-3">
                        <button type="submit"
                            class="px-5 py-2 text-sm border border-white text-white rounded-md hover:bg-white hover:text-gray-900 transition">
                            Recuperar
                        </button>
                        <a href="/"
                            class="px-5 py-2 text-sm border border-white text-white rounded-md hover:bg-white hover:text-gray-900 transition">
                            Voltar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
