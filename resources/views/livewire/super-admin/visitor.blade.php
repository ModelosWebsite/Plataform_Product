<div>
    <!-- 🔹 Filtros -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label>Empresa</label>
            <select wire:model="companyselect" class="form-control">
                <option value="">Todas Empresas</option>
                @foreach($companyList as $c)
                    <option value="{{ $c->name }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label>Navegador</label>
            <select wire:model="browser" class="form-control">
                <option value="">Todos Navegadores</option>
                <option value="Edge">Edge</option>
                <option value="Chrome">Chrome</option>
                <option value="Firefox">Firefox</option>
            </select>
        </div>

        <div class="col-md-4">
            <label>Mês</label>
            <select wire:model="month" class="form-control">
                <option value="">Todos Meses</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- 🔹 KPIs -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Total de Acessos</h6>
                <h4 class="text-primary">{{ $totalVisitors }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Visitantes Únicos</h6>
                <h4 class="text-success">{{ $uniqueVisitors }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Navegador Mais Usado</h6>
                <h4 class="text-info">{{ $topBrowser }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Empresa Mais Ativa</h6>
                <h4 class="text-warning">{{ $topCompany }}</h4>
            </div>
        </div>
    </div>

    <!-- 🔹 Tabela -->
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>IP</th>
                        <th>Dispositivo</th>
                        <th>Sistema</th>
                        <th>Navegador</th>
                        <th>Empresa</th>
                        <th>Tipo do Dispositivo</th>
                        <th>Data/Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->ip }}</td>
                            <td>{{ $visitor->device }}</td>
                            <td>{{ $visitor->system }}</td>
                            <td>{{ $visitor->browser }}</td>
                            <td>{{ $visitor->company }}</td>
                            <td>{{ $visitor->typedevice }}</td>
                            <td>{{ $visitor->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 40vh">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                    <p class="text-muted">Nenhum dado capturado dos visitantes</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginação -->
            <div class="mt-3">
                {{ $visitors->links() }}
            </div>
        </div>
    </div>
</div>
