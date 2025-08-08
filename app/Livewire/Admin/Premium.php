<?php

namespace App\Livewire\Admin;

use App\Models\{Payment, FunctionalityPlus, pacote};
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Carbon\Carbon;

class Premium extends Component
{
    public $code, $price, $id, $element, $status, $typeservice, $acceptTerms = false;
    protected $listeners = ['sendReference'=>'sendReference','openModal'=>'openModal'];

    use LivewireAlert;
    
    public function render()
    {
        return view('livewire.admin.premium', 
        ["packages" => FunctionalityPlus::query()->orderBy('title', 'asc')->get()])
        ->layout('layouts.config.app');
    }

    public function accept()
    {
        $this->acceptTerms = true;

        if ($this->acceptTerms) {
            $infoReference = [
                'amount' => $this->price,
                'referenceCode' => $this->code,
            ];

            //$responsePayment = Http::post('https://xzero.ao/api/payment/website', $infoReference)->json();

            //if ($responsePayment != null) {
            if (1) {
                $payment = Payment::create([
                    'reference' => $this->code,
                    'value' => $this->price,
                    'status' => $this->status ?? "pendente",
                    'typeservice' => $this->element->title,
                    'entity' => auth()->user()->company->companyname,
                    'company_id' => auth()->user()->company->id
                ]);

                pacote::create([
                    "payment_id" => $payment->id,
                    "package_name" => $this->element->title,
                    "company_id" => auth()->user()->company->id,
                    "start_date" => Carbon::now(),
                    "end_date" => Carbon::now()->addDays(31),
                    "functionality_plus_id" => $this->element->id,
                    "is_active" => true,
                ]);
            }
        }
    }

    //confirmar envio na api 
    public function generate($id)
    {
        try {
            
            $this->element = FunctionalityPlus::where('id', $id)->first();
            $this->price = $this->element->amount;

            $this->alert('warning', 'Confirmar', [
                'icon' => 'warning',
                'position' => 'center',
                'toast' => false,
                'text' => "Deseja adquerir ". $this->element->title ." ? "." Clique confirmar para prosseguir",
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Confirmar',
                'confirmButtonColor' => '#3085d6',
                'cancelButtonColor' => '#d33',
                'onConfirmed' => 'sendReference' 
            ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'confirmButtonColor' => '#222831e5',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    //comunicação na api
    public function sendReference()
    {
        try {
            $this->code = rand(100000000, 999999999);

            $this->dispatch("openModal");

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }
}