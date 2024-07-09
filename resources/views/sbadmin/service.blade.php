@extends("layouts.index")
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
                                class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                                <div class="col-xl-6">
                                    <h6 class="m-0 font-weight-bold text-white">Meus Serviços</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="col-xl-12 d-flex">
                                    <div class="col-xl-6">
                                        <form action="{{route("admin.store.service")}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Nome do serviço</label>
                                                <input type="text" class="form-control" name="title" placeholder="Insira o nome de um serviço...">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Descrição: </label>
                                                <input type="text" class="form-control" name="description" placeholder="Descreva o seu serviço...">
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Cadastrar">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-xl-6">
                                        <label class="form-label fs-1">Serviço</label>
                                        @foreach ($data as $item)
                                            <div class="form-group d-flex justify-content-between">
                                                <div>
                                                    <h5>{{$item->title}}</h5>
                                                    <p>{{$item->description}}</p>
                                                </div>
                                                <div>
                                                    <a href=""" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>
                                                    @include("sbadmin.includes.modal.service")
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection