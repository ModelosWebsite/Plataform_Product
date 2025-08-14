<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{company, BankAccount, Payment, pacote};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Services\Request as RequestService;
use Carbon\Carbon;


class ConfigPayment extends Component
{
    public $company, $method, $bank_name, $bank_account, $bank_holder, $delivery_method;
    public $referenceNumber, $status, $payment;
    public $paymentId, $package, $detailsXzero;
    public $checking = false;

    protected $listeners = ['updatePaymentMethod', 'generatePayment', 'checkStatus', 'updateDeliveryMethod', 'createBankAccount'];
    use LivewireAlert;

    public function mount()
    {
        $this->company = Company::find(auth()->user()->company_id);
        $this->loadBankAccount();
        $this->package = pacote::where("company_id", auth()->user()->company_id)->where("package_name", "Transferência")
        ->where("is_active", true)->latest()->first();

        $this->detailsXzero = RequestService::getCompany($this->company->companynif);

    }

        public function updateDeliveryMethod()
    {
        try {
            $this->company->delivery_method = $this->delivery_method;
            $this->company->save();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function createBankAccount()
    {
        try {
            // Verifica se já existe uma conta bancária para a empresa
            $existingAccount = BankAccount::where('company_id', $this->company->id)->first();

            if ($existingAccount) {
                // Atualiza os dados da conta existente
                $existingAccount->update([
                    'bank_name' => $this->bank_name,
                    'bank_account' => $this->bank_account,
                    'bank_holder' => $this->bank_holder,
                ]);

                $this->alert('success', 'Conta Atualizada', [
                    'text' => 'A conta bancária foi atualizada com sucesso!',
                    'toast' => false,
                    'position' => 'center'
                ]);
            } else {
                // Cria uma nova conta bancária
                BankAccount::create([
                    'company_id' => $this->company->id,
                    'bank_name' => $this->bank_name,
                    'bank_account' => $this->bank_account,
                    'bank_holder' => $this->bank_holder,
                ]);

                $this->alert('success', 'Conta Criada', [
                    'text' => 'A conta bancária foi criada com sucesso!',
                    'toast' => false,
                    'position' => 'center'
                ]);
            }

        } catch (\Throwable $th) {
            $this->alert('error', 'Erro ao salvar conta bancária', [
                'text' => $th->getMessage(),
                'toast' => false,
                'position' => 'center'
            ]);
        }
    }

    public function loadBankAccount()
    {
        $account = BankAccount::where('company_id', $this->company->id)->first();
        if ($account) {
            $this->bank_name = $account->bank_name;
            $this->bank_account = $account->bank_account;
            $this->bank_holder = $account->bank_holder;
        }
    }

    public function render()
    {
        return view('livewire.admin.config-payment');
    }
}