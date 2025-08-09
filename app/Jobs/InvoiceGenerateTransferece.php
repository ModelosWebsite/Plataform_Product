<?php

namespace App\Jobs;

use App\Models\company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\Request as RequestService;

class InvoiceGenerateTransferece implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
        // 1. CAPTURA DAS INFORMAÇÕES DA CONTA DA EMPRESA
        $companyHash = Cache::get('invoiceToken');

        Log::info("comapny", ["as" => $companyHash]);

        $dataCompany = Company::where("companyhashtoken", $companyHash)->first();
        $tokenTeste = "10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0";

        // 2. BUSCAR DADOS DA PB E DO PARCEIRO LOGÍSTICO
        $clientPb = RequestService::getCompany("50010487590");
        $logisticPartner = RequestService::getCompany("50010487590"); // Substituir futuramente por $delivery['logisticPartner']

        // 3. BUSCAR ENCOMENDAS ENTREGUES
        $deliveries = RequestService::verifyDeliveryStatus("ENTREGUE", $dataCompany->companytokenapi);
        Log::info("Entregas encontradas", compact('deliveries'));

        if (empty($deliveries)) {
            Log::warning("Nenhuma entrega encontrada para emissão.");
            return;
        }

        foreach ($deliveries as $delivery) {
            // Atualiza status da entrega
            $changeStatus = RequestService::changeDeliveryStatus($delivery['delivery']['reference'], $dataCompany->companytokenapi);

            if (!isset($changeStatus["message"])) {
                Log::warning("Falha ao alterar status da entrega", $changeStatus);
                continue;
            }

            // Montagem dos itens para a fatura
            $items = array_merge(
                [
                    [
                        "description" => "Taxa do Serviço de Entrega",
                        "tax" => 0,
                        "price" => $this->toNumber($delivery['delivery']['deliveryPrice']),
                        "quantity" => 1,
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ],
                    [
                        "description" => "Taxa de Serviço PB",
                        "tax" => 0,
                        "price" => $this->toNumber($delivery['delivery']['taxPb']),
                        "quantity" => 1,
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ]
                ],
                collect($delivery['products'] ?? [])->map(function ($item) {
                    return [
                        "description" => $item['item'],
                        "tax" => 0,
                        "price" => $this->toNumber($item['price']),
                        "quantity" => $item['quantity'],
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ];
                })->toArray()
            );

            // Duplicar produtos para outra fatura
            $itemsPB = collect($delivery['products'] ?? [])->map(function ($item) {
                return [
                    "description" => $item['item'],
                    "tax" => 0,
                    "price" => $this->toNumber($item['price']),
                    "quantity" => $item['quantity'],
                    "discount" => 0,
                    "retension" => 0,
                    "productType" => "Unidade",
                    "exemption_code" => "M10",
                ];
            })->toArray();

            if ($dataCompany->payment_type === "Referência") {
                // FATURA 1: PB → Cliente final
                $invoicePb = $this->createInvoice(
                    $tokenTeste,
                    //$clientPb['APIKEY'],
                    "FR",
                    $delivery['delivery'],
                    "Transferencia",
                    $items
                );
                Log::info("Fatura PB para Cliente", $invoicePb);

                // FATURA 2: Dono do Website → PB
                $onnerWebsite = $this->createInvoice(
                    $dataCompany->token_xzero,
                    "FT",
                    $clientPb,
                    "Transferencia",
                    $itemsPB
                );
                Log::info("Fatura Dono Website para PB", $onnerWebsite);

                // FATURA 3: Parceiro Logístico → PB
                $logisticPartnerInvoice = $this->createInvoice(
                    //$logisticPartner['APIKEY'],
                    $tokenTeste,
                    "FR",
                    $clientPb,
                    "Transferencia",
                    [[
                        "description" => "Taxa do Serviço de Entrega",
                        "tax" => 0,
                        "price" => $this->toNumber($delivery['delivery']['deliveryPrice']),
                        "quantity" => 1,
                        "discount" => 0,
                        "retension" => 0,
                        "productType" => "Unidade",
                        "exemption_code" => "M10",
                    ]]
                );
                Log::info("Fatura Parceiro Logístico", $logisticPartnerInvoice);
            } else {
                // FATURA 1 alternativa: Dono do Website → Cliente
                $onnerWebsite = $this->createInvoice(
                    $dataCompany->token_xzero,
                    "FR",
                    $delivery['delivery'],
                    "Transferencia",
                    $items
                );
                Log::info("Fatura Dono Website para Cliente", $onnerWebsite);
            }
        }
    } catch (\Throwable $th) {
        Log::error("Erro ao gerar faturas", [
            "message" => $th->getMessage(),
            "file" => $th->getFile(),
            "line" => $th->getLine()
        ]);
    }
} // End of handle()

    /**
     * Função utilitário para limpar preços
     */
    public function toNumber($value)
    {
        return str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $value);
    }

    /**
     * Função para criação de fatura via API
    */
    public function createInvoice($token, $type, $customer, $paymentType, $items)
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$token}",
        ])->post('https://xzero.live/api/invoice/create', [
            "isBackoffice" => "0",
            "type" => $type,
            "customerName" => $customer["client"] ?? $customer["Company"] ?? '',
            "customerPhone" => $customer["phone"] ?? $customer["Phone"] ?? '',
            "taxpayerNumber" => $customer["taxPayer"] ?? $customer["TaxPayer"] ?? '',
            "customerEmail" => $customer["email"] ?? $customer["Email"] ?? '',
            "customerAddress" => $customer["address"] ?? $customer["Address"] ?? '',
            "paymentType" => $paymentType,
            "items" => $items
        ])->json();
    }
}