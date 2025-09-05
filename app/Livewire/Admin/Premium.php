<?php

namespace App\Livewire\Admin;

use App\Models\{Payment, FunctionalityPlus, pacote, company};
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Services\InvoiceXzero;
use Carbon\Carbon;

class Premium extends Component
{
    public $selectedPackage, $code, $price, $id, $element, $status, $typeservice, $acceptTerms = false;
    protected $listeners = ['sendReference'=>'sendReference','openModal'=>'openModal'];

    use LivewireAlert;
    
    public function render()
    {
        return view('livewire.admin.premium', 
        ["packages" => FunctionalityPlus::query()->orderBy('title', 'asc')->get(),
        "packagesExtras" => pacote::where("company_id", auth()->user()->company->id)
            ->where("is_active", true)->latest()->get()])
        ->layout('layouts.config.app');
    }

    public function viewDetails($id)
    {
        $this->selectedPackage = FunctionalityPlus::find($id);
        $this->dispatch('open-modal', 'package-details');
    }

    public function accept()
    {
        $this->acceptTerms = true;

        if ($this->acceptTerms) {
            $infoReference = [
                'amount' => $this->price,
                'referenceCode' => $this->code,
            ];

            //$responsePayment = Http::post('https://xzero.live/api/payment/website', $infoReference)->json();

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
                    "is_active" => false,
                ]);

                
                $company = company::find(auth()->user()->company->id);
                if ($this->element->title === "Transferência") {
                    $company->delivery_method = "Meus Entregadores";
                    $company->save();
                }

                /*
                *  LOGICA PARA EMISSÃO DE FACTURA DOS ELEMENTOS PREMIUM
                */

                $infoXzero = \App\Services\Request::getCompany($company->companynif);

                $infoCompany = [
                    "name" => $infoXzero["Company"],
                    "phone" => $infoXzero["Phone"],
                    "taxPayer" => $infoXzero["TaxPayer"],
                    "email" => $infoXzero["Email"],
                    "address" => $infoXzero["Address"],
                ];


                $Invoice = InvoiceXzero::createInvoice(
                    "10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0",
                    "FR",
                    $infoCompany,
                    "Referência",
                    [[
                        "description" => $this->element->title,
                        "tax" => 0,
                        "price" => $this->element->amount,
                        "quantity" => 1,
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ]]);

                \Log::info("Elemento Premium", $Invoice);
            }
        }
    }

    //confirmar envio na api 
    public function generate($id)
    {
        try {
            
            $this->element = FunctionalityPlus::where('id', $id)->first();
            $this->price = $this->element->amount;

            $packagesExtras = pacote::where("company_id", auth()->user()->company->id)
            ->where("is_active", true)->where("package_name", $this->element->title)->latest()->first();

            if ($packagesExtras) {
                $this->alert('info', 'Informação', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'confirmButtonColor' => '#222831e5',
                    'text'=>'Já Possui este pacote activo'
                ]);
            }else {
                $this->alert('warning', 'Confirmar', [
                    'icon' => 'warning',
                    'position' => 'center',
                    'toast' => false,
                    'text' => "Deseja activar ". $this->element->title ." ? "." Clique confirmar para prosseguir",
                    'showConfirmButton' => true,
                    'showCancelButton' => true,
                    'cancelButtonText' => 'Cancelar',
                    'confirmButtonText' => 'Confirmar',
                    'confirmButtonColor' => '#3085d6',
                    'cancelButtonColor' => '#d33',
                    'onConfirmed' => 'sendReference' 
                ]);
            }
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