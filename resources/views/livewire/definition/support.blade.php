<div>
    <style>
        .tablinks {
            cursor: pointer;
        }
    </style>
    <!-- Card Body -->
    <div class="row">
        <!-- Sidebar com Imagens -->
        <div class="col-md-5 table-responsive">
            <table class="tab">
                @switch($dataCompanies->companybusiness)
                    @case('Product')
                            <tr class="tablinks active" onclick="openTab(event, 'hero')">
                                <td><img src="{{ asset("wireframe/home.png") }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'about')">
                                <td><img src="{{ asset('wireframe/about.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'value')">
                                <td><img src="{{ asset('wireframe/value.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'mvv')">
                                <td><img src="{{ asset('wireframe/value.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'prove')">
                                <td><img src="{{ asset('wireframe/prove.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'footer')">
                                <td><img src="{{ asset('wireframe/footer.png') }}" width="400" height="100" /></td>
                            </tr>
                        @break
                    @case('Portfolio')
                            <tr class="tablinks active" onclick="openTab(event, 'hero')">
                                <td><img src="{{ asset('wireframe/theme/portfolio/Hero.jpg') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="tablinks" onclick="openTab(event, 'hability')">
                                        <img src="{{ asset('wireframe/theme/portfolio/Competencias.png') }}" width="200" height="100" />
                                    </a>
                                    <a href="#" class="tablinks" onclick="openTab(event, 'about')">
                                        <img src="{{ asset('wireframe/theme/portfolio/Sobre-mim.png') }}" width="200" height="100" />
                                    </a>
                                </td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'service')">
                                <td><img src="{{ asset('wireframe/theme/portfolio/service.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'prove')">
                                <td><img src="{{ asset('wireframe/theme/portfolio/Componentes.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'works')">
                                <td><img src="{{ asset('wireframe/theme/portfolio/Trabalhos.png') }}" width="400" height="100" alt=""></td>
                            </tr>
                            <tr class="tablinks" onclick="openTab(event, 'footer')">
                                <td><img src="{{ asset('wireframe/theme/portfolio/footer.png') }}" width="400" height="100" alt=""></td>
                            </tr> 
                    @break
                    @case("Service")
                        <tr class="tablinks active" onclick="openTab(event, 'hero')">
                            <td><img class="img-fluid" src="{{ asset('theme/service/frame/Hero.jpg') }}" width="400" height="80" alt=""></td>
                        </tr>
                        <tr class="tablinks" onclick="openTab(event, 'about')">
                            <td><img class="img-fluid" src="{{ asset('theme/service/frame/wire_02.png') }}" width="400" height="80" /></td>
                        </tr>
                        <tr class="tablinks" onclick="openTab(event, 'service')">
                            <td><img class="img-fluid" src="{{ asset('theme/service/frame/Serviços.png') }}" width="400" height="80" alt=""></td>
                        </tr>
                        <tr class="tablinks" onclick="openTab(event, 'value')">
                            <td><img class="img-fluid" src="{{ asset('theme/service/frame/Componentes.png') }}" width="400" height="80" alt=""></td>
                        </tr>
                        <tr class="tablinks" onclick="openTab(event, 'footer')">
                            <td><img class="img-fluid" src="{{ asset('theme/service/frame/wire_06.png') }}" width="400" height="80" alt=""></td>
                        </tr>
                    @break
                    @default
                @endswitch
            </table>
        </div>

        <!-- Conteúdo Dinâmico -->
        <div class="col-md-7 mt-3">
            <div id="hero" class="tabcontent" style="display: block;"><livewire:config.inicial/></div>
            <div id="about" class="tabcontent"><livewire:config.about/></div>
            <div id="prove" class="tabcontent"><livewire:config.componente/></div>
            <div id="hability" class="tabcontent"><livewire:config.hability/></div>
            <div id="service" class="tabcontent"><livewire:config.service/></div>
            <div id="footer" class="tabcontent"><livewire:config.footer/></div>
            <div id="value" class="tabcontent"><livewire:config.competence/></div>
            <div id="mvv" class="tabcontent"><livewire:config.mvv/></div>
            <div id="works" class="tabcontent"><livewire:config.project/></div>
        </div>
        
    </div>

</div>
<!-- External JavaScript -->
<script src="{{ asset('js/tabs.js') }}"></script>