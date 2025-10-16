<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card">
        <div class="card-header">
            <button class="btn text-white btn-primary btn-sm" data-toggle="modal" data-target="#addsubcategory">Adicionar</button>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Subcategoria</th>
                        <th>Acção</th>
                    </thead>
                    <tbody>
                        @forelse ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory['subcategory'] ?? ''}}</td>
                                <td>""</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include("modals.admin.subcategory")
</div>