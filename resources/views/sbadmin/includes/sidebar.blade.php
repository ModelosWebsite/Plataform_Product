<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("plataform.product.admin.index")}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Painel Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(Route::current()->getName() == "plataform.product.admin.index") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "plataform.product.admin.index") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.index")}}">
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
                    <a class="collapse-item {{(Route::current()->getName() == "definition.general") ? "text-primary" : ""}}" href="{{route("definition.general")}}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Definições Gerais</span>
                    </a>
    {{-- 
                     <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.about") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.about")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Sobre</span>
                    </a> --}}
    
                    {{-- <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.footer") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.footer")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Rodapé</span>
                    </a>
                    
    
                    <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.question") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.question")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Detalhes Questão</span>
                    </a>
                    
    
                    <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.detail") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.detail")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Detalhes</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "plataform.product.admin.color" ? "text-primary" : ""}}" href="{{route("plataform.product.admin.color")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Cores</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "plataform.product.admin.background.image" ? "text-primary" : ""}}" href="{{route("plataform.product.admin.background.image")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Imagens de Fundo</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "admin.panel.question" ? "text-primary" : ""}}" href="{{route("admin.panel.question")}}">
                        <i class="fa fa-fw fa-tachometer-alt"></i>
                        <span>Perguntas Frequentes</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "plataform.product.admin.products" ? "text-primary" : ""}}" href="{{route("plataform.product.admin.products")}}">
                        <i class="fa fa-fw fa-tachometer-alt"></i>
                        <span>Produtos</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "plataform.product.admin.elements" ? "text-primary" : ""}}" href="{{route("plataform.product.admin.elements")}}">
                        <i class="fa fa-fw fa-tachometer-alt"></i>
                        <span>Elementos</span>
                    </a>
    
                    <a class="collapse-item {{Route::current()->getName() == "admin.config.view" ? "text-primary" : ""}}" href="{{route("admin.config.view")}}">
                        <i class="fa fa-fw fa-tachometer-alt"></i>
                        <span>Configurações</span>
                    </a> --}}
    
                    <a class="collapse-item" href="#" data-toggle="modal" data-target="#help">
                        <i class="fa fa-fw fa-cog"></i>
                        <span>Ajuda</span>
                    </a>
                        {{-- 
                    <a class="collapse-item {{Route::current()->getName() == "plataform.product.admin.background.profile.user" ? "text-primary" : ""}}" href="{{route("plataform.product.admin.background.profile.user")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Perfil</span>
                    </a> --}}
    
                </div>
            </div>
    </li>
        

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(Route::current()->getName() == "shoppind.list.deliveries") ? "bg-white" : ""}}">
        <a class="nav-link {{(Route::current()->getName() == "shoppind.list.deliveries") ? "text-primary" : ""}}" href="{{route("shoppind.list.deliveries")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Controle Encomendas</span>
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
                <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.loja.online") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.loja.online")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Adicionar</span>
                </a>

                <a class="collapse-item {{(Route::current()->getName() == "plataform.product.admin.delivery.status") ? "text-primary" : ""}}" href="{{route("plataform.product.admin.delivery.status")}}" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Verificar meu Pedido</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>