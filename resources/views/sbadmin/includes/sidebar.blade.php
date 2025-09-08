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
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'active bg-white rounded-pill mx-1 my-1 shadow-sm' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('plataform.product.admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt me-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Definições -->
    <li class="nav-item">
        <a class="nav-link collapsed d-flex align-items-center" href="#" data-toggle="collapse" data-target="#definition"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog me-2"></i>
            <span>Definições</span>
        </a>

        <div id="definition" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item d-flex align-items-center {{ Route::current()->getName() == 'definition.general' ? 'fw-bold text-primary' : '' }}"
                   href="{{ route('definition.general') }}">
                    <i class="fas fa-sliders-h me-2"></i> 
                     Definições Gerais
                </a>

                <a class="collapse-item d-flex align-items-center" href="#" data-toggle="modal" data-target="#helpGoogle">
                    <i class="fas fa-question-circle me-2"></i> 
                    Ajuda
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Loja -->
    <li class="nav-item {{ Route::current()->getName() == 'admin.general.shopping' ? 'active bg-white rounded-pill mx-2 my-1 shadow-sm' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'admin.general.shopping' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('admin.general.shopping') }}">
            <i class="fas fa-store me-2"></i>
            <span>Loja/Produtos</span>
        </a>
    </li>

    <!-- Nav Item - Premium -->
    <li class="nav-item {{ Route::current()->getName() == 'admin.shopping.premium' ? 'active bg-white rounded-pill mx-2 my-1 shadow-sm' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'admin.shopping.premium' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('admin.shopping.premium') }}">
            <i class="fas fa-star me-2 {{ Route::current()->getName() == 'admin.shopping.premium' ? 'text-warning' : '' }}"></i>
            <span>Elementos Premium</span>
        </a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.logout' ? 'active bg-white rounded-pill mx-2 my-1 shadow-sm' : '' }}">
        <a class="nav-link d-flex align-items-center {{ Route::current()->getName() == 'plataform.product.logout' ? 'text-primary fw-bold' : '' }}"
           href="{{ route('plataform.product.logout') }}">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span>Sair da Conta</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline mb-3">
        <button class="rounded-circle border-0 shadow-sm" id="sidebarToggle"></button>
    </div>
</ul>
