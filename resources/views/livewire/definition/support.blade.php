<div>
    <!-- Card Body -->
    <div class="row">
        <!-- Sidebar com Imagens -->
        <div class="col-md-5">
            <table class="tab">
                <tr class="tablinks active" onclick="openTab(event, 'hero')">
                    <td><img src="{{ asset("wireframe/home.png") }}" width="400" height="100" alt=""></td>
                </tr>
                <tr class="tablinks" onclick="openTab(event, 'service')">
                    <td><img src="{{ asset('wireframe/about.png') }}" width="400" height="100" alt=""></td>
                </tr>
                <tr class="tablinks" onclick="openTab(event, 'components')">
                    <td><img src="{{ asset('wireframe/value.png') }}" width="400" height="100" alt=""></td>
                </tr>
                <tr class="tablinks" onclick="openTab(event, 'works')">
                    <td><img src="{{ asset('wireframe/prove.png') }}" width="400" height="100" alt=""></td>
                </tr>
                <tr class="tablinks" onclick="openTab(event, 'footer')">
                    <td><img src="{{ asset('wireframe/contact.png') }}" width="400" height="100" alt=""></td>
                </tr>
                <tr class="tablinks" onclick="openTab(event, 'competencias')">
                    <td><img src="{{ asset('wireframe/footer.png') }}" width="400" height="100" /></td>
                </tr>
            </table>
        </div>

        <!-- Conteúdo Dinâmico -->
        <div class="col-md-6 mt-3">
            <div id="hero" class="tabcontent" style="display: block;">@livewire("config.inicial")</div>
            <div id="competencias" class="tabcontent">@livewire("config.competence")</div>
            <div id="about" class="tabcontent">@livewire("config.about")</div>
            <div id="service" class="tabcontent">@livewire("config.service")</div>
            <div id="components" class="tabcontent">@livewire("config.componente")</div>
            <div id="works" class="tabcontent">@livewire("config.project")</div>
            <div id="footer" class="tabcontent">@livewire("config.footer")</div>
        </div>
        
    </div>

    <!-- External Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}" />

    <!-- External JavaScript -->
    <script src="{{ asset('js/tabs.js') }}"></script>
</div>