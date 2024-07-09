@extends("layouts.admin.app")
@section("title", "Painel Admin - Hero")
@section("content")
@include("sweetalert::alert")

    {{-- side bar --}}
    @include("sbadmin.includes.sidebar")
    {{-- end side bar --}}

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
                                    <h6 class="m-0 font-weight-bold text-white">Dados Pessoais e Historicos</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex">
                                <div class="col-xl-12">
                                        <div class="{{count($data) == 1 ? "d-none" : ""}}">
                                            <form action="{{route("plataform.product.admin.about.store")}}" method="post">
                                                @csrf
                                                <div class="">
                                                    <div class="form-group col-xl-6">
                                                        <label class="form-label">Descrição:</label>
                                                        <textarea name="p1" class="form-control" id="" cols="30" rows="5" placeholder="Insira uma breve Descrição..."></textarea>
                                                    </div>
    
                                                    <div class="form-group col-xl-6">
                                                        <label class="form-label">Descrição 1:</label>
                                                        <textarea name="p2" class="form-control" id="" cols="30" rows="5" placeholder="Insira uma breve Descrição..."></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                                                    </div>

                                            </form>
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    @foreach ($data as $item)

                                        <div class="form-group">
                                            <label class="form-label">Decrição </label>
                                            <p>{{$item->p1}}</p>
                                        </div>

                                        <div class="form-group">
                                            <p>{{$item->p2}}</p>
                                        </div>

                                        <div class="form-group">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>                                         
                                            <a href="{{route("plataform.product.admin.about.delete", $item->id)}}" class="btn btn-danger">Eliminar</a>                                         
                                            @include("sbadmin.includes.modal.about")
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