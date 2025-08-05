<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{company, BankAccount, Payment, pacote};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Carbon\Carbon;


class ConfigPayment extends Component
{
    public $company, $method, $bank_name, $bank_account, $bank_holder, $delivery_method;
    public $referenceNumber, $status, $payment;
    public $paymentId, $package;
    public $checking = false;

    protected $listeners = ['updatePaymentMethod', 'generatePayment', 'checkStatus', 'updateDeliveryMethod', 'createBankAccount'];
    use LivewireAlert;

    public function mount()
    {
        $this->company = Company::find(auth()->user()->company_id);

        $this->package = Pacote::where('company_id', $this->company->id)
        ->where('is_active', true)->where("pacote", "Transferência")->latest()->first();

        if ($this->package && Carbon::now()->between($this->package->start_date, $this->package->end_date)) {
            $this->is_active = true;
        }

        $this->loadBankAccount();
    }

    public function updatePaymentMethod()
    {
        try {
            if ($this->method === "Transferência") {
                $this->generatePayment();
            } else {
                $this->company->payment_type = $this->method;
                $this->company->save();
            }
        } catch (\Throwable $th) {
            // Log error se necessário
        }
    }

    public function generatePayment()
    {
        try {
        $this->referenceNumber = rand(100000000, 999999999);

        $this->payment = Payment::create([
            'reference' => $this->referenceNumber,
            'company_id' => $this->company->id,
            'status' => 'pendente',
            'value' => 25000,
            'typeservice' => "Pagamento por Transferência",
        ]);

        $this->paymentId = $this->payment->id;
        $this->checking = true;

        // Alerta inicial de pagamento pendente
        $this->alert('warning', 'Aguardando pagamento', [
            'html' => "<div style='font-size:26px; font-weight:bold;'>
                        <h5>Referência: {$this->referenceNumber}</h5>
                        <h5>Preço: 25 000.00 kz</h5>
                        </div>
                       <p>Estamos aguardando o processamento do pagamento...</p>",
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => false,
            'allowOutsideClick' => false,
            'timerProgressBar' => false,
            'timer' => null,
        ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

        public function checkStatus()
    {
        if (!$this->checking || !$this->paymentId) {
            return;
        }

        $payment = Payment::find($this->paymentId);

        if ($payment && $payment->status === 'processado') {
            $this->checking = false;
            $this->company->payment_type = $this->method;
            $this->company->save();

            pacote::create([
                "pacote" => "Transferência",
                "company_id" => $this->company->id,
                "start_date" => Carbon::now(),
                "end_date" => Carbon::now()->addDays(31),
                "is_active" => true,
                "status" => "premium",
            ]);

            $this->alert('success', 'Pagamento processado!', [
                'text' => 'Obrigado, o pagamento foi confirmado.',
                'timer' => 3000,
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
        }
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