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
                                class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                                <div class="col-xl-6">
                                    <h6 class="m-0 font-weight-bold text-white">Detalhes</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex">
                                <div class="col-xl-6" style=" {{count($infos) == 3 ? "display: none" : ""}}">
                                    <form action="{{route("plataform.product.admin.datail.store")}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Titulo</label>
                                            <input type="text" name="title" class="form-control" placeholder="Escreva o titulo">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Descrição</label>
                                            <input type="text" name="description" class="form-control" placeholder="descrição">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Adicionar">
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-6 mt-4">
                                    <label class="form-label">Detalhes: </label>
                                    @foreach ($infos as $item)
                                        <div class="form-group mt-2">
                                            <div>
                                                <h5>{{$item->title}}</h5>
                                            </div>

                                            <div>
                                                <h6>{{$item->description}}</h6>
                                            </div>

                                            
                                        </div> 
                                        <div class="mt-2">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</button>
                                            <a href="{{route("plataform.product.admin.datail.delete", $item->id)}}" class="btn btn-danger">Eliminar</a>
                                            @include("sbadmin.includes.modal.skill")
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
@endsection