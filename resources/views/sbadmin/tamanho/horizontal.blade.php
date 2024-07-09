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
                                <h4 class="m-0 font-weight-bold text-white">Meus Anúncios</h4>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                                @if ($Horizontal)
                                    @foreach ($Horizontal as $item)
                                        <div class="mb-1" >
                                            <div class="">
                                                <h5>{{$item->name ?? ""}}</h5>
                                            </div>
                                            <div>
                                                <div class="mb-3">
                                                    <img src="{{url("/storage/{$item->image}")}}" alt="" class="mb-2">
                                                </div>
                                                <div class="">
                                                    <a href="{{route("anuncio.management.delete",$item->id)}}" class="btn btn-danger col-1">Eliminar</a>
                                                    <a href="{{$item->id}}" class="btn btn-primary col-1" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}">Editar</a>
                                                    @include("sbadmin.includes.modal")
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="container-fluid" style="margin-top: 17rem">
                                    <div class="row col-xl-12 d-flex justify-content-center align-content-center">
                                    
                                        <div class="text-center">
                                            <h1>Não Existem Anúncio</h1>
                                        </div>
                                        
                                    </div> 
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection