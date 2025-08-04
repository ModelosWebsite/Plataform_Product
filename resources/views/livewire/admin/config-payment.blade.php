<div>
    <div class="form-group col-6">
        <label for="payment_type">Método de Pagamento: {{ $company->payment_type }}</label>
        <select id="payment_type" wire:change="updatePaymentMethod" wire:model="method" class="form-control">
            <option value="" selected>{{ __('Selecione um método de pagamento') }}</option>
            <option value="Referência">{{ __('Referência') }}</option>
            <option value="Transferência">{{ __('Transferência') }}</option>
        </select>
    </div>

    @if($company->payment_type === "Transferência")
        <div class="form-group col-6">
            <label for="bank_details">Detalhes Bancários</label>
        </div>
        <div class="form-group col-6">
            <label for="bank_name">Nome do Banco</label>
            <input type="text" id="bank_name" wire:model="bank_name" class="form-control">
        </div>
        <div class="form-group col-6">
            <label for="bank_account">IBAN da Conta</label>
            <input type="text" id="bank_account" wire:model="bank_account" class="form-control">
        </div>
        <div class="form-group col-6">
            <label for="bank_holder">Titular da Conta</label>
            <input type="text" id="bank_holder" wire:model="bank_holder" class="form-control">
        </div>
        <div>
            <button class="btn btn-primary" wire:click="createBankAccount">Salvar Detalhes</button>
        </div>
    @endif
</div>