<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('plataform.product.admin.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Painel Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'bg-white' : '' }}">
        <a class="nav-link {{ Route::current()->getName() == 'plataform.product.admin.index' ? 'text-primary' : '' }}"
            href="{{ route('plataform.product.admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#definition"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Definições</span>
        </a>

        <div id="definition" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Route::current()->getName() == 'definition.general' ? 'text-primary' : '' }}"
                    href="{{ route('definition.general') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Definições Gerais</span>
                </a>

                <a class="collapse-item" href="#" data-toggle="modal" data-target="#helpGoogle">
                    <i class="fa fa-fw fa-cog"></i>
                    <span>Ajuda</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(Route::current()->getName() == "admin.general.shopping") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "admin.general.shopping") ? "text-primary" : ""}}" href="{{route("admin.general.shopping")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>loja Produtos</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Definições -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePremium"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Elementos Premium</span>
        </a>

        <div id="collapsePremium" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Route::current()->getName() == 'plataform.product.admin.loja.online' ? 'text-primary' : '' }}"
                    href="{{ route('plataform.product.admin.loja.online') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Adicionar</span>
                </a>

                <a class="collapse-item {{ Route::current()->getName() == 'plataform.product.admin.delivery.status' ? 'text-primary' : '' }}"
                    href="{{ route('plataform.product.admin.delivery.status') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Verificar meu Pedido</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::current()->getName() == 'plataform.product.logout' ? 'bg-white' : '' }}">
        <a class="nav-link {{ Route::current()->getName() == 'plataform.product.logout' ? 'text-primary' : '' }}"
            href="{{ route('plataform.product.logout') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sair da Conta</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
