@section("title", "Categorização Premium")
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                        <div class="col-xl-12 d-flex justify-content-between">
                            <div>
                                <h4 class="m-0 font-weight-bold text-white">Categoria de Elemento Premium</h4>
                            </div>
                            <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-white text-primary" data-toggle="modal" data-target="#addElement">
                                Adicionar
                            </button>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-striped table-responsive-md">
                            <thead class="text-white" style="background: rgb(0, 74, 222)">
                            <tr>
                                <th scope="col">Elemento</th>
                                <th scope="col">Preço</th>
                                <th scope="col">acção</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($packages as $package)
                                    <tr>
                                        <td>{{$package->title ?? ''}}</td>
                                        <td>{{ number_format($package->amount, 2,'.', ' ' ?? '0.00') }} kz</td>
                                        <td>                    
                                            <button class="btn btn-primary" wire:click="edit({{ $package->id }})" data-toggle="modal" data-target="#addElement">
                                                Editar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12">
                                            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 60vh">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                </svg>
                                                <h2 class="text-muted no-items-message">Nenhum Item Cadastrado</h2>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("modals.superadmin.create-premium")
</div>