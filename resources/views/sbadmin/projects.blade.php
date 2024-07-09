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
                                    <h6 class="m-0 font-weight-bold text-white">Detalhes </h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                               <div class="col-xl-12 d-flex">
                                    <div class="col-xl-6" style="{{count($infos) >= 1 ? "display: none" : ""}}">
                                        <form action="{{route("plataform.product.admin.question.store")}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Titulo:</label>
                                                <input type="text" class="form-control" name="title" placeholder="Insira o nome dpo projecto...">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Descrição</label>
                                                <input type="text" class="form-control" name="description" placeholder="Insira o nome dpo projecto...">
                                            </div>
        
        
                                            <div class="form-group">
                                                <input type="submit" value="Adicionar" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-xl-6 mt-4">
                                        @foreach ($infos as $item)
                                            <div class="form-group">
                                                <div>
                                                    <label class="form-label">Questão:</label>
                                                    <h5>{{$item->title}}</h5>
                                                </div>

                                                <div>
                                                    <label class="form-label">Descrição</label>
                                                    <h5>{{$item->description}}</h5>
                                                </div>
    

                                            </div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</button>
                                            <a href="{{route("plataform.product.admin.question.delete", $item->id)}}" class="btn btn-danger">Editar</a>
                                            @include("sbadmin.includes.modal.projects")
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