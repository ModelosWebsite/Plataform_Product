<div class="container-fluid col-md-12">
    <!-- Ajustes de responsividade -->
    <style>
        /* Evita quebra de conteúdo */
        .nowrap-table th,
        .nowrap-table td {
            white-space: nowrap;
        }

        /* Ajustes mobile */
        @media (max-width: 576px) {
            .no-items-message {
                font-size: 16px;
                text-align: center;
            }

            .card-header h5 {
                font-size: 16px;
            }

            .card-header button {
                font-size: 14px;
                padding: 6px 12px;
            }
        }
    </style>

    <div class="">
        <!-- Card Header -->
        <div class="card-header flex-row align-items-center justify-content-between col-xl-12">
            <div class="col-xl-12 d-flex justify-content-between">
                <div></div>
                <div>
                    <button class="btn btn-sm bg-primary text-white" data-toggle="modal" data-target="#additem">
                        Adicionar
                    </button>
                </div>
            </div>
        </div>


        <!-- Card Body -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle nowrap-table">
                <thead class="text-white bg-primary">
                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Qtd.</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Taxa/Iva</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acções</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($getItens) && count($getItens) > 0)
                        @foreach ($getItens as $item)
                            @if (is_array($item) && isset($item['reference']))
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['category'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>
                                        <div style="text-align: right !important;">
                                            @if($item['tax'] > 0)
                                                {{ number_format($item['priceWithTax'], 2, '.', ' ') }} kz </br>
                                                <span class="badge badge-dark">Iva incluído</span>
                                            @else
                                                {{ number_format($item['price'], 2, '.', ' ') }} kz
                                            @endif 
                                        </div>
                                    </td>
                                    <td>{{ $item['tax'] }}%</td>
                                    <td>
                                        <span class="{{ $item['status'] === 'DISPONIVEL' ? 'bg-primary text-light' : 'bg-danger text-light' }} p-1 rounded">
                                            {{ $item['status'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#additem" wire:click="editItem('{{ $item['reference'] }}')">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" wire:click="deleteItem('{{ $item['reference'] }}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">
                                <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 60vh">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                    <h2 class="text-muted no-items-message">Nenhum Item Cadastrado</h2>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal Start --}}
    @include("modals.create_itens")
    @include("modals.edit_item")
    {{-- modal End --}}
</div>