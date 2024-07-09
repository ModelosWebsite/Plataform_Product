@extends("layouts.admin.app")
@section("title", "Painel Administrativo")
@section("content")
@include("sbadmin.includes.sidebar")
@include("sweetalert::alert")
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        @include("sbadmin.includes.topbar")
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                            <div class="col-xl-6">
                                <h6 class="m-0 font-weight-bold text-white">Hero - Inicial</h6>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body d-flex">
                            <div class="col-xl-6" style=" {{count($hero) > 0 ? "display: none" : ""}}">
                                <form action="{{route("plataform.product.admin.hero.save")}}" method="post" enctype="multipart/form-data">
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
                                        <label class="form-label">Imagem</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Adicionar">
                                    </div>
                                </form>
                            </div>
                            
                             <div class="col-xl-6 mt-4">
                                <label class="form-label">Hero - Inicial</label>
                                @foreach ($hero as $item)
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <div>
                                                <h5>{{$item->title}}</h5>
                                            </div>
                                            <div>
                                                <h6>{{$item->description}}</h6>
                                            </div>
                                        </div> 
    
                                        <div >
                                            <img src="/image/{{$item->img}}" alt="" style="width: 100px">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</button>
                                        <a href="{{route("plataform.product.admin.hero.delete", $item->id)}}" class="btn btn-danger">Eliminar</a>
                                        @include("sbadmin.includes.modal.hero")
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