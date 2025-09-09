<div class="col-12">
    <!-- Método de Pagamento -->
    <div class="card mb-4 border-0">
        <h5 class="fw-bold text-primary mb-3">
            <i class="fa fa-credit-card me-2"></i> Método de Pagamento
        </h5>
        <p class="mb-2">Selecionado: <strong>{{ $company->payment_type ?? "Não definido" }}</strong></p>

        @if($company->payment_type === "Transferência")
            <h6 class="fw-bold mt-3">Detalhes Bancários  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#infoXzero">Adicionar Informações Bancarias</a></h6>
            @php  $nameCompany = $detailsXzero["Company"] ?? ""  @endphp
            @forelse($detailsXzero['bankAccounts'] ?? [] as $bankAccount)
                <div class="p-3 mb-3 bg-light rounded border">
                    <p class="mb-1"><strong>Banco:</strong> {{ $bankAccount['bank'] }}</p>
                    <p class="mb-1"><strong>IBAN:</strong> AO06 {{ trim(chunk_split($bankAccount['ibam'], 4, ' ')) ?? ''}}</p>
                    <p class="mb-0"><strong>Titular:</strong> {{ $nameCompany ?? '' }}</p>
                </div>
            @empty
                <p class="text-muted">Nenhum dado bancário cadastrado.</p>
            @endforelse
        @endif
    </div>

    <!-- Método de Entrega -->
    <div class="card border-0">
        <h5 class="fw-bold text-primary mb-3">
            <i class="fa fa-truck me-2"></i> Método de Entrega
        </h5>
        <p class="mb-2">Selecionado: <strong>{{ $company->delivery_method ?? "Não definido" }}</strong></p>

        @if($package)
            <p class="text-muted">Entrega vinculada ao pacote selecionado.</p>
        @else
            <div class="form-group">
                <label for="delivery_method" class="fw-semibold">Escolher Método de Entrega</label>
                <select id="delivery_method" wire:change="updateDeliveryMethod" wire:model="delivery_method" class="form-select mt-1">
                    <option value="" selected>{{ __('Selecione um método de entrega') }}</option>
                    <option value="Meus Entregadores">{{ __('Meus Entregadores') }}</option>
                    <option value="Entregadores PB">{{ __('Entregadores PB') }}</option>
                </select>
            </div>
        @endif
    </div>
</div>
