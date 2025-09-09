<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3"
       href="{{ route('plataform.product.admin.index') }}">
        <i class="fas fa-cubes fs-3 me-2"></i>
        <div class="sidebar-brand-text mx-1 fw-bold">Painel Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'bg-white text-primary' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('plataform.product.admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt me-2 {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'text-primary' : '' }}"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - settings -->
    <li class="nav-item {{ Route::current()->getName() == 'definition.general' ? 'bg-white text-primary' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'definition.general' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('definition.general') }}">
            <i class="fas fa-fw fa-cog me-2 {{ Route::current()->getName() == 'definition.general' ? 'text-primary' : '' }}"></i>
            <span> Definições Gerais </span>
        </a>
    </li>

    <!-- Nav Item - Loja -->
    <li class="nav-item {{ Route::current()->getName() == 'admin.general.shopping' ? 'bg-white text-primary' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'admin.general.shopping' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('admin.general.shopping') }}">
            <i class="fas fa-store me-2 {{ Route::current()->getName() == 'admin.general.shopping' ? 'text-primary' : '' }}"></i>
            <span>Loja/Produtos</span>
        </a>
    </li>

    <!-- Nav Item - Premium -->
    <li class="nav-item {{ Route::current()->getName() == 'admin.shopping.premium' ? 'bg-white text-primary' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'admin.shopping.premium' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('admin.shopping.premium') }}">
            <i class="fas fa-star me-2 {{ Route::current()->getName() == 'admin.shopping.premium' ? 'text-primary' : '' }}"></i>
            <span>Elementos Premium</span>
        </a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.logout' ? 'bg-white text-primary' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'plataform.product.logout' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('plataform.product.logout') }}">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span>Sair da Conta</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>

<a class="collapse-item d-flex align-items-center btn-flutuante" href="#" data-toggle="modal" data-target="#helpGoogle">
   <i class="fas fa-question-circle me-2"></i> 
    Ajuda
</a>

<style>
    .btn-flutuante {
        position: fixed;
        bottom: 20px;   /* distância do fundo */
        right: 20px;    /* distância da lateral direita */
        background-color: #0d6efd; /* cor de fundo */
        color: #fff; /* cor do texto/ícone */
        padding: 12px 20px;
        border-radius: 50px;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: background 0.3s;
        z-index: 1050; /* para ficar acima de outros elementos */
    }

    .btn-flutuante:hover {
        background-color: #0b5ed7;
        text-decoration: none;
        color: #fff;
    }
</style>
