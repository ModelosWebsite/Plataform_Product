<!-- Form to Update Item Status -->
<form id="itemStatusForm" action="{{ route('items.updateStatus') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="status" id="itemStatusCheck" {{ isset($termos->status) === 'active' ? 'checked' : '' }}>
        <label class="form-check-label" for="itemStatusCheck">
            Ativar/Desativar
        </label>
    </div>
</form>
<!-- Form to Update Company Status -->
<form id="companyStatusForm" action="{{ route('admin.update.status.company') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="status" id="companyStatusCheck" {{ $statusSite->status === 'enable' ? 'checked' : '' }}>
            <label class="form-check-label" for="companyStatusCheck">
                Aceitar Termos da PB e Habilitar Site
            </label>
        </div>
    </div>
</form>