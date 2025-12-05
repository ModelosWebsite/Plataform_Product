<?php

namespace App\Livewire\Site;

use App\Models\{company, CustomerPayment, Marking, Payment};
use App\Services\InvoiceXzero;
use App\Services\PaymentService;
use Illuminate\Support\Facades\{Http, Session, Log};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AppointmentComponet extends Component
{
    use LivewireAlert;
    public $referenceCode, $payMarking, $paymentMarking, $company;
    public $full_name, $email, $phone, $methodpayment, $accept = false;

    public function render()
    {
        $this->company = company::where('companyhashtoken', session('tokencompany'))->firstOrFail();

        return view('livewire.site.appointment-componet', [
            "appointments" => Marking::query()
            ->where("company_id", $this->company->id)->latest()->get()
        ]);
    }

    public function markingFree($id)
    {
        try {
            Session::put("idCalendar", $id);

            return redirect()->route('produto.calendar.appointment', ["company" => session("tokencompany")]);
        } catch (\Throwable $th) {
            Log::error("AppointmentComponent@finallyMarking", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);            
            return null;
        }
    }

    public function marking($id)
    {
        try {
            $this->referenceCode = PaymentService::generateReference();
            $this->payMarking =  Marking::query()->find($id);

            // 1️⃣ Montar dados para API externa
            $infoReference = [
                'amount' => $this->payMarking->cost,
                'description' => 'Marcações',
                'referenceCode' => $this->referenceCode,
                'receipt' => 'test',
            ];

            // $responsePayment = Http::withHeaders([
            //     "Accept" => "application/json",
            //     "Content-Type" => "application/json",
            // ])->post('https://xzero.live/api/payment/website', $infoReference)->json();

            // Log::info("PaymentService@processPayment", [
            //     "message" => $responsePayment
            // ]);

            $this->dispatch('openModalMarking');
        } catch (\Throwable $th) {
            Log::error("AppointmentComponet@finallyMarking", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);            
            return null;
        }
    }

    public function acceptTerms()
    {
        try {

            if ($this->accept == false) {
                $this->accept = true;
            } else {
                $this->accept = false;
            }

        } catch (\Throwable $th) {
            Log::error('Erro ao chamar os pagamentos', [
                 'erro' => $th->getMessage(),
                 'file' => $th->getFile(),
                 'line' => $th->getLine(),
             ]);

             $this->alert('error', 'Erro Interno', [
                 'toast' => false,
                 'position' => 'center',
                 'text' => 'Ocorreu um erro. Verifique os logs.',
            ]);
        }
    }
    
    // Método para monitorar o pagamento
    public function checkPayment()
    {
        try {
            if (!$this->paymentMarking) return;
            
            $payment = Payment::find($this->paymentMarking->id);

            $customer = [
                "name" => $this->full_name,
                "phone" => $this->phone,
                "taxPayer" => "999999999",
                "email" => $this->email,
                "address" => "Padrão",
            ];
            $items = [
                "description" => $this->payMarking->title,
                "tax" => 0,
                "price" => $this->payMarking->cost,
                "quantity" => 1,
                "discount" => 0,
                "retension" => 0,
                "productType" => "Unidade",
                "exemption_code" => "M10",
            ];
            
            if ($payment && $payment->status === 'processado') {
                //$payment->update(['status' => 'expirado']);
                //processo de emissão de factura
                $invoice = InvoiceXzero::createInvoice(
                    $this->company->token_xzero,"FR" ,$customer,"Referencia",$items
                );

                Log::info("marcações fatura", ["messages" => $invoice]);

                $event = $this->dispatch('closepaymentmodal');                
                //Pagamento foi processado
                $this->alert('success', 'SUCESSO', [
                    'timer' => 2000,
                    'toast' => false,
                    'position' => 'center',
                    'text' => "Pagamento realizado com sucesso!",
                ]);

                $this->reset();
                Session::put("loadPayment", false);

                return redirect()->route('produto.calendar.appointment', ["company" => session("tokencompany")]);
            }

        } catch (\Throwable $th) {
            Log::error("Erro ao checar Pagamento", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
            return null;
        }
    }

    public function finallyMarking($idCalendar)
    {
        
        try {
            Session::forget("idCalendar");
            Session::forget("loadPayment");

            $company = company::where("companyhashtoken", session("tokencompany"))->first();

            $this->paymentMarking = Payment::create([
                'reference' => $this->referenceCode,
                'value' => $this->payMarking->cost,
                'status' => "pendente",
                'typeservice' => $this->payMarking->title ?? "Marcações",
                'company_id' => $company->id
            ]);

            $cp = CustomerPayment::create([
                "payment_id" => $this->paymentMarking->id,
                "paymentmethod" => $this->methodpayment,
                "telefone" => $this->phone, 
                "email" => $this->email,
                "name" => $this->full_name,
            ]);

            Session::put("idCalendar", $idCalendar);
            Session::put("loadPayment", true);

        } catch (\Throwable $th) {
            Log::error("AppointmentComponent@finallyMarking", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);            
            return null;
        }
    }
}