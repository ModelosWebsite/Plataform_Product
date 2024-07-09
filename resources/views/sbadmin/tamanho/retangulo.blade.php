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
                        <div class="card-header bg-primary py-3 d-flex justify-content-between col-xl-12">
                            <div class="col-xl-6 d-flex justify-content-between">
                                <h4 class="m-0 font-weight-bold text-white">Criar Um Anúncio</h4>
                            </div>
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
                                        <label class="form-label">Tipo/Formato</label>
                                        <select name="tipo" id="" class="form-control">
                                            <option value="Vertical">Vertical</option>
                                            <option value="Horizontal">Horizontal</option>
                                            <option value="Quadrado">Quadrado</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link</label>
                                        <input type="text" name="link" class="form-control" placeholder="Insira o link do anuncio...">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Fotografia</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("sbadmin.includes.modal")
@endsection