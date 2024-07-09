@extends("layouts.index")
@section("title", "Painel Admin - Hero")
@section("content")
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
                                <div class="col-xl-6 d-flex justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-white">Criar Um Anúncio</h4>
                                </div>
                                <h4 class="text-white">Meus Anúncios</h4>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body d-flex">
                                <div class="col-xl-6">
                                    <form action="{{route("anuncio.management.store")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Titulo</label>
                                            <input type="text" name="name" class="form-control" placeholder="Insira a informação...">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Descrição</label>
                                            <input type="text" name="description" class="form-control" placeholder="Insira a informação...">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Fotografia</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Cadastrar">
                                        </div>
                                    </form>

                                    {{-- <div class="col-xl-6">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Status</button>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="col-xl-6">
                                    @foreach ($anuncio as $item)
                                        <div class="mb-1">
                                            <div class="">
                                                <h5>{{$item->name}}</h5>
                                            </div>
                                            <div>
                                                <div style="width: 600px; height:120px">
                                                    <img src="/image/{{$item->image}}" alt="" width="100%" class="mb-3">
                                                </div>
                                                <div>
                                                    <a href="#" class="btn btn-primary mr-2">Status</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}" >Editar</a>
                                                </div>
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
    @include("sbadmin.includes.modal.publicidade")
@endsection