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
                                    <h6 class="m-0 font-weight-bold text-white">Footer e Contacto</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="col-xl-12">
                                    <div class="col-xl-6 {{count($footer) == 1 ? "d-none" : ""}}">
                                        <form action="{{route("plataform.product.admin.footer.store")}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Telefone</label>
                                                <input type="text" class="form-control" name="telefone" placeholder="Insira o seu contacto..">
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Insira o seu email..">
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label">Endereço</label>
                                                <input type="text" class="form-control" name="endereco" placeholder="Insira o seu endereço..">
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label">Atendimento</label>
                                                <input type="text" class="form-control" name="atendimento" placeholder="Insira uma frase em destaque..">
                                            </div>
    
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" value="Adicionar">
                                            </div>
                                        </form>
                                        
                                    </div>

                                    <div>
                                        @foreach ($footer as $item)
                                        <div class="form-group">
                                            <label class="form-label">Telefone</label>
                                            <h5>{{$item->telefone}}</h5>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <h5>{{$item->email}}</h5>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Endereço</label>
                                            <h5>{{$item->endereco}}</h5>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Atendimento</label>
                                            <h5>{{$item->atendimento}}</h5>
                                        </div>

                                        <div class="form-group">
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>
                                            <a href="{{route("plataform.product.admin.footer.delete", $item->id)}}" class="btn btn-danger">Eliminar</a>
                                            @include("sbadmin.includes.modal.footer")
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