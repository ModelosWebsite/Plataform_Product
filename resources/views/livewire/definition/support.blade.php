<div>
    <!-- Card Body -->
    <div class="row">
        <!-- Sidebar com Imagens -->
        <div class="col-md-5 table-responsive">
            <table class="tab">
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
            </table>
        </div>

        <!-- Conteúdo Dinâmico -->
        <div class="col-md-7 mt-3">
            <div id="hero" class="tabcontent" style="display: block;">@livewire("config.inicial")</div>
            <div id="about" class="tabcontent">@livewire("config.about")</div>
            <div id="prove" class="tabcontent">@livewire("config.componente")</div>
            <div id="footer" class="tabcontent">@livewire("config.footer")</div>
            <div id="value" class="tabcontent">@livewire("config.competence")</div>
            <div id="mvv" class="tabcontent">@livewire("config.service")</div>
            {{-- 
            <div id="works" class="tabcontent">@livewire("config.project")</div>
             --}}
        </div>
        
    </div>

    <!-- External Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}" />

    <!-- External JavaScript -->
    <script src="{{ asset('js/tabs.js') }}"></script>
</div>