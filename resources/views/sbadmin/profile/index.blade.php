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

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                 <div class="col-12">
                    <!-- Card Profile -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h5 class="m-0 font-weight-bold text-white">Dados de Acesso</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-6">
                                @foreach ($profile as $data)
                                <div class="form-group">
                                    <label for="" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" value="{{$data->name}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">E-mail:</label>
                                    <input type="text" class="form-control" value="{{$data->email}}" disabled>
                                </div>

                                <div class="from-group">
                                    <button class="btn btn-primary px-4" data-toggle="modal" data-target="#credential{{$data->id}}">Editar </button>
                                    @include("sbadmin.profile.credential")
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- /. Begin Page Content -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
@endsection