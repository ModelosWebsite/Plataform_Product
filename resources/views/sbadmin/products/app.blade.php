@extends("layouts.admin.app")
@section("title", "Painel Admin - Hero")
@section("content")
@include("sweetalert::alert")
    {{-- side bar --}}
    @include("sbadmin.includes.sidebar")

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include("sbadmin.includes.topbar")

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12 col-lg-6">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header bg-primary py-3 d-flex justify-content-between col-xl-12">
                                <div class="col-xl-12 d-flex justify-content-between">
                                    <div>
                                        <h4 class="m-0 font-weight-bold text-white">Produtos</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn bg-white text-primary" data-toggle="modal" data-target="#product">
                                            Adicionar
                                        </button>
                                        @include("sbadmin.products.create")
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex">
                                <div class="col-xl-12">
                                    <table class="table table-striped-columns">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Nome</th>
                                                <th>Preço</th>
                                                <th>Descrição</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($products))
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>
                                                            <img width="100" src="{{asset("image/$product->image")}}" alt="">
                                                        </td>
                                                        <td>{{$product->title}}</td>
                                                        <td>{{$product->price}}</td>
                                                        <td>{{$product->description}}</td>
                                                        <td>
                                                            <button class="btn btn-primary"  data-toggle="modal" data-target="#productEdit{{$product->id}}">Editar</button>
                                                            <a class="btn btn-danger" href="{{route("plataform.product.admin.delete.product", $product->id)}}">Eliminar</a>
                                                            @include("sbadmin.products.edit")
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="text-center">
                                                    <h1>Nenhum Produto Encontrado</h1>
                                                </div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include("sbadmin.includes.modal.publicidade") --}}
@endsection