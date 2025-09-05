<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

    <!-- Botão Toggle (visível apenas em telas menores) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 bg-white shadow-sm">
        <i class="fa fa-bars text-primary"></i>
    </button>

    <!-- Espaço flexível para empurrar conteúdo para a direita -->
    <div class="ml-auto d-flex align-items-center">

        <!-- Informações do Usuário -->
        <span class="h5 mb-0 text-white font-weight-bold">
            {{ auth()->user()->name ?? "" }}
        </span>
        
    </div>
</nav>