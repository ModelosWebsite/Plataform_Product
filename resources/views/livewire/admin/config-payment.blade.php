<div class="row">
    <div class="col-6">
        <div class="form-group col-12 mb-3">
            <h5>Método de Pagamento: {{ $company->payment_type }}</h5>
        </div>
        <h6 for="bank_details">{{$detailsXzero['APIKEY']}}</h6>
        @if($company->payment_type === "Transferência")
            <div class="form-group col-6">
                    <h6 for="bank_details">Detalhes Bancários</h6>
                </div>
                <div class="form-group col-6">
                    <h6 for="bank_name">Nome do Banco</h6>
                    <input type="text" id="bank_name" wire:model="bank_name" class="form-control">
                </div>
                <div class="form-group col-6">
                    <h6 for="bank_account">IBAN da Conta</h6>
                    <input type="text" id="bank_account" wire:model="bank_account" class="form-control">
                </div>
                <div class="form-group col-6">
                    <h6 for="bank_holder">Titular da Conta</h6>
                    <input type="text" id="bank_holder" wire:model="bank_holder" class="form-control">
                </div>
                <div>
                    <button class="btn btn-primary" wire:click="createBankAccount">Salvar Detalhes</button>
                </div>
        @endif
    </div>

    <div class="col-6">
        <div class="form-group col-12 mb-3">
            <h5>Método de Entrega: {{ $company->delivery_method }}</h5>
        </div>
        @if($package)

        @else
            <div class="form-group col-12">
                <h6 for="delivery_method">Método de Entrega</h6>
                <select id="delivery_method" wire:change="updateDeliveryMethod" wire:model="delivery_method" class="form-control">
                    <option value="" selected>{{ __('Selecione um método de entrega') }}</option>
                    <option value="Meus Entregadores">{{ __('Meus Entregadores') }}</option>
                    <option value="Entregadores PB">{{ __('Entregadores PB') }}</option>
                </select>
            </div>
        @endif
    </div>

</div>