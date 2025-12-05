<?php

namespace App\Services;

use App\Models\{Payment, company, pacote};
use App\Services\{Request, InvoiceXzero};
use Illuminate\Support\Facades\{Http, Log};
use Illuminate\Support\Carbon;
use Throwable;

class PaymentService
{
    /** 
    * Gera uma referência numérica única
    */
    public static function generateReference(): int
    {
        return rand(100000000, 999999999);
    }
    /**
     * Processa o pagamento e toda a lógica relacionada.
     */
    public static function processPayment($user, $element, $price, $code)
    {
        try {
            // 1️⃣ Montar dados para API externa
            $infoReference = [
                'amount' => $price,
                'description' => 'test',
                'referenceCode' => $code,
                'receipt' => 'test',
            ];

            $responsePayment = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ])->post('https://xzero.live/api/payment/website', $infoReference)->json();

            Log::info("PaymentService@processPayment", [
                "message" => $responsePayment
            ]);
            
            if (!empty($responsePayment['status']) && $responsePayment['status'] === true) { // Caso queira validar resposta real
                // 2️⃣ Criar pagamento
                $payment = Payment::create([
                    'reference' => $code,
                    'value' => $price,
                    'status' => 'pendente',
                    'typeservice' => $element->title ?? $element,
                    'entity' => $user->company->companyname ?? "",
                    'company_id' => $user->company->id ?? "",
                ]);
                
                // 3️⃣ Criar pacote
                $pacote = pacote::create([
                    'payment_id' => $payment->id,
                    'package_name' => $element->title ?? $element,
                    'company_id' => $user->company->id,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addDays(31),
                    'functionality_plus_id' => $element->id ?? null,
                    'is_active' => false,
                ]);

                
                // 4️⃣ Atualizar método de entrega da empresa
                $company = company::find($user->company->id);
                if ($element->title ?? $element === "Transferência") {
                    $company->delivery_method = "Meus Entregadores";
                    $company->save();
                }
                
                // 5️⃣ Emitir factura (Xzero)
                $infoXzero = Request::getCompany($company->companynif);
                
                $infoCompany = [
                    "name" => $infoXzero["Company"],
                    "phone" => $infoXzero["Phone"],
                    "taxPayer" => $infoXzero["TaxPayer"],
                    "email" => $infoXzero["Email"],
                    "address" => $infoXzero["Address"],
                ];
                
                $invoice = InvoiceXzero::createInvoice(
                    "10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0",
                    "FR",
                    $infoCompany,
                    "Referência",
                    [[
                        "description" => $element->title ?? $element,
                        "tax" => 0,
                        "price" => $element->amount ?? $price,
                        "quantity" => 1,
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ]]
                );
                    
                Log::info("Elemento Premium", $invoice);

                return $payment;
        }

        } catch (Throwable $th) {
            Log::error('Erro ao processar pagamento', [
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            throw $th;
        }
    }
}