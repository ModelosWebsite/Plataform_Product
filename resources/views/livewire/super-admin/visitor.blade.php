<div>
    <!-- 🔹 Filtros -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Inicio</label>
            <input class="form-control shadow-none form-control-sm" type="date" wire:model.live="start_date"/>
        </div>

        <div class="col-md-6">
            <label class="form-label">Final</label>
            <input class="form-control shadow-none form-control-sm" type="date" wire:model.live="end_date"/>
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
    <div class="col-12 row">
        <div class="col-6">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Empresa</th>
                            <th>Total de Impressões</th>
                            <th>Visitas Únicas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visitsByCompany as $visitor)
                            <tr>
                                <td>{{ $visitor['company'] }}</td>
                                <td>{{ $visitor['total_visits'] }}</td>
                                <td>{{ $visitor['unique_visits'] }}</td>
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

                {{-- <!-- Paginação -->
                <div class="mt-3">
                    {{$visitors->links("livewire::simple-bootstrap")}}
                </div> --}}
            </div>
        </div>

        <style>
            .card-sm {
                max-height: 350px;   /* altura menor */
                min-height: 250px;
            }

            .card-header-sm {
                padding: 0.4rem 0.8rem; /* cabeçalho mais compacto */
                font-size: 0.9rem;
            }
        </style>

        <div class="col-6">
            <div class="card shadow-sm mb-3">
                <div class="card-header card-header-sm bg-primary text-white">
                    Visitas por Navegador
                </div>
                <div class="card-body">
                    <canvas id="browserChart"></canvas>
                </div>
            </div>

            <div class="card card-sm shadow-sm mb-3">
                <div class="card-header card-header-sm bg-primary text-white">
                    Visitas por Dia da Semana
                </div>
                <div class="card-body">
                    <canvas id="weekDayChart"></canvas>
                </div>
            </div>

            <div class="card card-sm shadow-sm mb-3">
                <div class="card-header card-header-sm bg-primary text-white">
                    Visitas por Horario
                </div>
                <div class="card-body">
                    <canvas id="periodChart"></canvas>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-header card-header-sm bg-primary text-white">
                    Visitas por Dispositivo
                </div>
                <div class="card-body">
                    <canvas id="deviceChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Browser
        new Chart(document.getElementById("browserChart"), {
            type: 'pie',
            data: {
                labels: @json(array_column($visitsByBrowser, 'browser')),
                datasets: [{
                    data: @json(array_column($visitsByBrowser, 'total'))
                }]
            }
        });

        // Dia da semana
        new Chart(document.getElementById("weekDayChart"), {
            type: 'bar',
            data: {
                labels: @json(array_column($visitsByWeekDay, 'weekday')),
                datasets: [{
                    label: 'Visitas',
                    data: @json(array_column($visitsByWeekDay, 'total'))
                }]
            }
        });

        // Período do dia
        new Chart(document.getElementById("periodChart"), {
            type: 'bar',
            data: {
                labels: @json(array_map(fn($row) => $row['hour'] . "h (" . $row['period'] . ")", $visitsByPeriod)),
                datasets: [{
                    label: 'Visitas por Hora',
                    data: @json(array_column($visitsByPeriod, 'total')),
                    fill: true,
                    tension: 0.3
                }]
            }
        });

        // Dispositivo
        new Chart(document.getElementById("deviceChart"), {
            type: 'doughnut',
            data: {
                labels: @json(array_column($visitsByDevice, 'typedevice')),
                datasets: [{
                    data: @json(array_column($visitsByDevice, 'total'))
                }]
            }
        });
    </script>