<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Company, BankAccount};
use Jantinnerezo\LivewireAlert\LivewireAlert;


class ConfigPayment extends Component
{
    public $company, $method, $bank_name, $bank_account, $bank_holder;
    use LivewireAlert;

    public function mount()
    {
        $this->company = Company::find(auth()->user()->company_id);
        $this->loadBankAccount();
    }

    public function updatePaymentMethod()
    {
        try {
            $this->company->payment_type = $this->method;
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