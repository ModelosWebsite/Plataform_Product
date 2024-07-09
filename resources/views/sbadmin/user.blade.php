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
                                class="card-header bg-primary py-3 flex-row d-flex justify-content-between col-xl-12">
                                <div class="col-xl-6 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-white">Utilizadores</h6>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="col-xl-6">
                                    <form action="{{route("anuncio.management.user.store")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control" placeholder="Insira a informação...">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Insira a informação...">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Senha</label>
                                            <input type="password" name="password" class="form-control" placeholder="Insira a informação...">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Cadastrar">
                                        </div>
                                    </form>
                                </div>

                                <div class="">
                                    <table class="table ">
                                        <thead>
                                            <th scope="col">id</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Chave</th>
                                            <th scope="col">Acção</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="row">{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <div>
                                                            {{$user->key}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route("anuncio.management.delete.user", $user->id)}}" class="btn btn-danger">Eliminar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection