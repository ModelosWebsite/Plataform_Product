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
            //CAPTURA DAS INFORMAÇÕES DA CONTA DO ARTISTA
            $dataCompany = company::where("companyhashtoken", Cache::get('invoiceToken'))->first();
            //BUSCAR DADOS DA PB VIA API - XZERO
            $clientPb = \App\Services\Request::getCompany("50010487590");
            //BUSCAR AS EMCOMENDAS VIA API - KYTUTES
            $deliveries = \App\Services\Request::verifyDeliveryStatus("ENTREGUE", $dataCompany->companytokenapi);
            Log::info("Deliveries", [$deliveries]);
            if (isset($deliveries) and $deliveries != null) {
                foreach ($deliveries as $delivery) {
                    //BUSCAR DADOS DO PARCEIRO LOGISTICO VIA API - XZERO
                    $logisticPartner = \App\Services\Request::getCompany("50010487590");
                    //$logisticPartner = \App\Services\Request::getCompany($delivery['delivery']['logisticPartner']);
                    //ALTERAR ESTADO DAS ENCOMENDAS
                    $changeStatus = \App\Services\Request::changeDeliveryStatus($delivery['delivery']['reference'], $dataCompany->companytokenapi);
                    /* Criar items */
                    $items = [
                        [
                            "description" => "Taxa do Serviço de Entrega",
                            "tax" => 0,
                            "price" => str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $delivery['delivery']['deliveryPrice']),
                            "quantity" => 1,
                            "discount" => 0,
                            "retension" => 0,
                            "productType" => "Unidade",
                            "exemption_code" => "M10",
                        ],
                        [
                            "description" => "Taxa de Serviço PB",
                            "tax" => 0,
                            "price" => str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $delivery['delivery']['taxPb']),
                            "quantity" => 1,
                            "discount" => 0,
                            "retension" => 0,
                            "productType" => "Unidade",
                            "exemption_code" => "M10",
                        ]
                    ];
                    $itemsPB = [];
                    if (isset($delivery["products"])) {
                        foreach ($delivery["products"] as $item) {
                            array_push($items, [
                                "description" =>  $item['item'],
                                "tax" => 0,
                                "price" => str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $item['price']),
                                "quantity" => $item['quantity'],
                                "discount" => 0,
                                "retension" => 0,
                                "productType" => "Unidade",
                                "exemption_code" => "M10",
                            ]);
                        }

                        foreach ($delivery["products"] as $item) {
                            array_push($itemsPB, [
                                "description" =>  $item['item'],
                                "tax" => 0,
                                "price" => str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $item['price']),
                                "quantity" => $item['quantity'],
                                "discount" => 0,
                                "retension" => 0,
                                "productType" => "Unidade",
                                "exemption_code" => "M10",
                            ]);
                        }
                    }

                    if (isset($changeStatus["message"])) {
                        if ($dataCompany->payment_type === "Referência") {
                            //EMISSÃO DE FATURA DA PB PARA CLIENTE
                            $invoicePb = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                //'Authorization' => 'Bearer 10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0',
                                'Authorization' => "Bearer {$clientPb["APIKEY"]}",
                            ])->post('https://fortcodedev.com/api/invoice/create', [
                                "isBackoffice" => "0",
                                "type" => "FR",
                                "customerName" => $delivery['delivery']['client'],
                                "customerPhone" => $delivery['delivery']['phone'],
                                "taxpayerNumber" => $delivery['delivery']['taxPayer'],
                                "customerEmail" => $delivery['delivery']['email'],
                                "customerAddress" => $delivery['delivery']['address'],
                                "paymentType" => "Transferencia",
                                "items" => $items
                            ])->json();

                            Log::info("CreateInvoice PB para cliente", [$invoicePb]);

                            //EMISSÃO DE FATURA DO DONO DO WEBSITE PARA O PB
                            $onnerWebsite = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => "Bearer {$dataCompany->token_xzero}",
                            ])->post('https://fortcodedev.com/api/invoice/create', [
                                "isBackoffice" => "0",
                                "type" => "FT",
                                "customerName" => $clientPb["Company"],
                                "customerPhone" => $clientPb["Phone"],
                                "taxpayerNumber" => $clientPb["TaxPayer"],
                                "customerEmail" => $clientPb["Email"],
                                "customerAddress" => $clientPb["Address"],
                                "paymentType" => "Transferencia",
                                "items" => $itemsPB
                            ])->json();

                            Log::info("CreateInvoice Dono Website para PB", [$onnerWebsite]);

                            //EMISSÃO DE FACTURA DO PARCEIRO LOGISTICO PARA PB
                            if (true) {
                                $logisticPartnerInvoice = Http::withHeaders([
                                    'Accept' => 'application/json',
                                    'Content-Type' => 'application/json',
                                    //'Authorization' => "Bearer 10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0",
                                    'Authorization' => "Bearer {$logisticPartner["APIKEY"]}",
                                ])->post('https://fortcodedev.com/api/invoice/create', [
                                    "isBackoffice" => "0",
                                    "type" => "FR",
                                    "customerName" => $clientPb["Company"],
                                    "customerPhone" => $clientPb["Phone"],
                                    "taxpayerNumber" => $clientPb["TaxPayer"],
                                    "customerEmail" => $clientPb["Email"],
                                    "customerAddress" => $clientPb["Address"],
                                    "paymentType" => "Transferencia",
                                    "items" => [
                                        [
                                            "description" => "Taxa do Serviço de Entrega",
                                            "tax" => 0,
                                            "price" => str_replace(['.', ',', 'Kz', ' '], ['', '.', '', ''], $delivery['delivery']['deliveryPrice']),
                                            "quantity" => 1,
                                            "discount" => 0,
                                            "retension" => 0,
                                            "productType" => "Unidade",
                                            "exemption_code" => "M10",
                                        ]
                                    ]
                                ])->json();
                                Log::info("CreateInvoice LogisticPartner", [$logisticPartnerInvoice]);
                            }
                        }else{
                            //EMISSÃO DE FATURA DO DONO DO WEBSITE PARA O CLIENTE
                            $onnerWebsite = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => "Bearer {$dataCompany->token_xzero}",
                            ])->post('https://fortcodedev.com/api/invoice/create', [
                                "isBackoffice" => "0",
                                "type" => "FR",
                                "customerName" => $delivery['delivery']['client'],
                                "customerPhone" => $delivery['delivery']['phone'],
                                "taxpayerNumber" => $delivery['delivery']['taxPayer'],
                                "customerEmail" => $delivery['delivery']['email'],
                                "customerAddress" => $delivery['delivery']['address'],
                                "paymentType" => "Transferencia",
                                "items" => $items
                            ])->json();

                            Log::info("CreateInvoice Dono Website para Cliente", [$onnerWebsite]);
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            Log::info("error generate invoices", [$th->getMessage()]);
        }
    }
}
