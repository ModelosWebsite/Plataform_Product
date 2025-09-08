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
            \Log::error("Erro ao atualizar método de entrega: ",[
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ]);
            DB::rollBack();
            $this->alert('error', 'Erro ao atualizar método de entrega', [
                'text' => $th->getMessage(),
                'toast' => false,
                'position' => 'center'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.config-payment');
    }
}