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
                                <h6 class="m-0 font-weight-bold text-white">Cadastrar Cores</h6>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body ">
                            <div class="col-xl-6">
                                <form action="{{route("plataform.product.admin.color.store")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Selecione uma cor Backgroud</label>
                                        <input type="color" name="codigo" class="form-control form-control-color">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Selecione uma cor Para sa letra</label>
                                        <input type="color" name="letra" class="form-control form-control-color">
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
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
@endsection