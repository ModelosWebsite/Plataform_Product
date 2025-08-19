@extends("layouts.admin.app")
@section("title", "Empresas - Painel SuperAdmin")
@section("content")
@include("sweetalert::alert")
{{-- side bar --}}
@include("superadmin.includes.sidebar")

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include("superadmin.includes.topbar")

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header bg-primary py-3 flex-row align-items-center justify-content-between col-xl-12">
                            <div class="col-xl-12 d-flex justify-content-between">
                                <h4 class="m-0 font-weight-bold text-white">Lista de Empresas</h4>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="col-xl-12">
                                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                                    <thead class="bg-primary text-white">
                                        <th>Empresa</th>
                                        <th>Email</th>
                                        <th>Negócio</th>
                                        <th>NIF</th>
                                        <th>Token - Link</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                        <tr>
                                            <td>{{$company->companyname}}</td>
                                            <td>{{$company->companyemail}}</td>
                                            <td>{{$company->companybusiness}}</td>
                                            <td>{{$company->companynif}}</td>
                                            <td>{{$company->companyhashtoken}}</td>
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