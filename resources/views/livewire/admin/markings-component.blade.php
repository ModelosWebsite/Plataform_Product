@section("title", "Marcações")
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-0 pb-0">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-globe2 me-2"></i> Marcações
            </h5>
        </div>

        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Marcação de</th>
                            <th>Descrição breve</th>
                            <th>Custo por marcação</th>
                            <th>HTML de marcação para embed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->title ?? "" }}</td>
                                <td>{{ $appointment->description ?? "" }}</td>
                                <td style="text-align: end;">{{ number_format($appointment->cost,2,'.', ' ') ?? "" }} kz</td>
                                <td>{{ Str::limit($appointment->html_embed, 40, '...') ?? "" }}</td>
                            </tr>
                        @empty
                            <td colspan="12">
                                <div class="d-flex justify-content-center align-items-center flex-column" style="height: 30vh;">
                                    <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                                    <h6 class="fw-normal">Nenhuma marcação adicionada</h6>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div colspan="12">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <button class="btn btn-primary btn-sm mt-3" data-toggle="modal"
                        data-target="#appointmentModal">
                        <i class="fa fa-plus-lg me-1"></i> Adicionar Agora
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal End --}}
    @include('modals.admin.appointment')
</div>