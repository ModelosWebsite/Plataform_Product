@section("title", "Tela de Inscrição")

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-900 via-purple-900 to-blue-900 p-6">
    
    <!-- Card -->
    <div class="w-full max-w-5xl bg-gray-900 text-gray-200 rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Header -->
        <div class="p-6 border-b border-gray-800 text-center">
            <h2 class="text-2xl font-bold">Crie aqui o seu <span class="text-blue-400">Website Clássico</span></h2>
        </div>
        
        <!-- Body -->
        <div class="p-8">
            <form wire:submit.prevent="createAccountSite" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">Nome<span class="text-red-500">*</span></label>
                    <input wire:model="name" type="text" id="name" placeholder="Informe o Nome"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Sobrenome -->
                <div>
                    <label for="lastname" class="block text-sm font-medium mb-1">Sobrenome<span class="text-red-500">*</span></label>
                    <input wire:model="lastname" type="text" id="lastname" placeholder="Informe o Sobrenome"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('lastname') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email<span class="text-red-500">*</span></label>
                    <input wire:model="email" type="email" id="email" placeholder="Informe o Email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- NIF -->
                <div>
                    <label for="companynif" class="block text-sm font-medium mb-1">NIF<span class="text-red-500">*</span></label>
                    <input wire:model="companynif" type="text" id="companynif" placeholder="Informe o NIF"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('companynif') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Imagem -->
                <div>
                    <label for="image" class="block text-sm font-medium mb-1">Imagem<span class="text-red-500">*</span></label>
                    <input wire:model="image" type="file" id="image"
                        class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('image') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Crie uma senha<span class="text-red-500">*</span></label>
                    <input wire:model="password" type="password" id="password" placeholder="Crie uma senha"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Confirmar Senha -->
                <div>
                    <label for="confirmpassword" class="block text-sm font-medium mb-1">Confirme a senha<span class="text-red-500">*</span></label>
                    <input wire:model="confirmpassword" type="password" id="confirmpassword" placeholder="Confirme a senha"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('confirmpassword') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Telefone -->
                <div>
                    <label for="phone" class="block text-sm font-medium mb-1">Telefone<span class="text-red-500">*</span></label>
                    <input wire:model="phone" type="text" id="phone" placeholder="999999999"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Província -->
                <div>
                    <label for="province" class="block text-sm font-medium mb-1">Província<span class="text-red-500">*</span></label>
                    <input wire:model="province" type="text" id="province" placeholder="Província"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('province') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Município -->
                <div>
                    <label for="municipality" class="block text-sm font-medium mb-1">Município<span class="text-red-500">*</span></label>
                    <input wire:model="municipality" type="text" id="municipality" placeholder="Município"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('municipality') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Endereço -->
                <div>
                    <label for="address" class="block text-sm font-medium mb-1">Endereço<span class="text-red-500">*</span></label>
                    <input wire:model="address" type="text" id="address" placeholder="Endereço"
                        class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Localização -->
                <div>
                    <label class="block text-sm font-medium mb-1">Localização da sua Loja</label>
                    @if (isset($locationMap) and count($locationMap) > 0)
                        <select wire:model="mylocation"
                            class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">--Selecionar--</option>
                            @foreach ($locationMap as $locationValue)
                                <option value="{{ $locationValue['location'] ?? '' }}">
                                    {{ $locationValue['location'] ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @error('mylocation') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Botão Registrar -->
                <div class="md:col-span-3 pt-4">
                    <button type="submit"
                        class="w-full py-3 rounded-lg bg-blue-600 hover:bg-blue-700 font-semibold shadow-md transition">
                        Registrar minha Conta
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="p-6 border-t border-gray-800 text-center">
            <p>Já tem uma conta?
                <a href="{{route('plataform.product.login.view')}}" class="text-blue-400 hover:underline">
                    Fazer Login
                </a>
            </p>
        </div>
    </div>

    <!-- Loader -->
    <div class="fixed inset-0 bg-black bg-opacity-75 flex-col items-center justify-center hidden"
         wire:loading.class="flex" wire:loading.class.remove="hidden" wire:target="createAccountSite">
        <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
        <p class="mt-6 text-gray-200 text-lg">A sua conta está a ser criada, aguarde...</p>
    </div>
</div>
