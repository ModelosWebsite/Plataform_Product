@extends("layouts.admin.app")
@section("title", "Painel Administrativo")
@section("content")
@include("sbadmin.includes.sidebar")
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        @include("sbadmin.includes.topbar")
        <!-- End of Topbar -->

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header bg-primary py-3 flex-row d-flex justify-content-between col-xl-12">
                            <div class="col-xl-6 d-flex justify-content-between">
                                <h6 class="m-0 font-weight-bold text-white">Imagens de Fundo</h6>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body d-flex">
                            <div class="col-xl-6">
                                <form action="{{route("plataform.product.admin.background.image.store")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Carregar Imagem</label>
                                        <input type="file" name="image" class="form-control" placeholder="Insira a informação...">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Secção</label>
                                        <select class="form-control" name="tipo">~
                                            <option disabled selected> Selecione a secção</option>
                                            <option value="Start">Inicio</option>
                                            <option value="AboutMain">Sobre Principal</option>
                                            <option value="AboutSecund">Sobre Segundaria</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-6 d-flex row-cols-3">
                                @foreach ($fundo as $item)  
                                    <div style="width: 200px; height: 150px;" class="p-2">
                                        <img src="{{url("/storage/$item->image")}}" style="width: 100%; height: 100%;" alt="">
                                        <a href="{{$item->id}}" class="btn btn-primary mt-3" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>
                                        <a href="{{route("plataform.product.admin.background.image.delete", $item->id)}}" class="btn btn-danger mt-3">Eliminar</a>
                                        @include("sbadmin.includes.fundo")
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
@endsection