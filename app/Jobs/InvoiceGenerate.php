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

class InvoiceGenerate implements ShouldQueue
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
            $dataCompany = company::where("companyhashtoken", Cache::get('company_token'))->first();
            //BUSCAR DADOS DA PB VIA API - XZERO
            $clientPb = \App\Services\Request::getCompany("5001048759");
            //BUSCAR AS EMCOMENDAS VIA API - KYTUTES
            $deliveries = \App\Services\Request::verifyDeliveryStatus("ENTREGUE", $dataCompany->companytokenapi);

            if (isset($deliveries) and $deliveries != null) {
                foreach ($deliveries as $delivery) {

                    //BUSCAR DADOS DO PARCEIRO LOGISTICO VIA API - XZERO
                    $logisticPartner = \App\Services\Request::getCompany($delivery['delivery']['logisticPartner']);
                    //ALTERAR ESTADO DAS ENCOMENDAS
                    $changeStatus = \App\Services\Request::changeDeliveryStatus($delivery['delivery']['reference'], $dataCompany->companytokenapi);
                    /** Criar items */
                    $items = [];
                    if (isset($delivery["products"])) {
                        foreach ($delivery["products"] as $item) {
                            Log::info("Price", [$item['price']]);
                            array_push($items, [
                                "description" => $item['item'],
                                "tax" => 0,
                                "price" => $item['price'],
                                "quantity" => $item['quantity'],
                                "discount" => 0,
                                "retension" => 0,
                                "productType" => "Unidade",
                                "exemption_code" => "M10",
                            ]);
                        }
                    }

                    if (isset($changeStatus["message"])) {
                        //EMISSÃO DE FATURA DO ARTISTA PARA PB
                        $artistPb = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer ' . $dataCompany->token_xzero,
                        ])->post('http://192.168.100.130:8000/api/invoice/create', [
                            "isBackoffice" => "0",
                            "type" => "FR",
                            "customerName" => $clientPb["Company"],
                            "customerPhone" => $clientPb["Phone"],
                            "taxpayerNumber" => $clientPb["TaxPayer"],
                            "customerEmail" => $clientPb["Email"],
                            "customerAddress" => $clientPb["Address"],
                            "paymentType" => "Transferencia",
                            "items" => $items
                        ])->json();

                        //EMISSÃO DE FATURA DA PB PARA O CLIENTE
                        $pbClient = Http::withHeaders([
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer 10|NeK7hEiyZi5boujA1B3nWGSPQgb7Adt3u6EUA0Swd75947f0',
                        ])->post('http://192.168.100.130:8000/api/invoice/create', [
                            "isBackoffice" => "0",
                            "type" => "FR",
                            "customerName" => $delivery['delivery']['client'],
                            "customerPhone" => $delivery['delivery']['phone'],
                            "taxpayerNumber" => $delivery['delivery']['taxPayer'],
                            "customerEmail" => $delivery['delivery']['email'],
                            "customerAddress" => $delivery['delivery']['address'],
                            "paymentType" => $delivery['delivery']['paymentType'],
                            "items" => $items
                        ])->json();

                        if ($delivery['delivery']['logisticPartner'] != null) {
                            //EMISSÃO DE FACTURA DO PARCEIRO LOGISTICO PARA PB
                            $logisticPartnerInvoice = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' .$logisticPartner["APIKEY"],
                            ])->post('http://192.168.100.130:8000/api/invoice/create', [
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
                                        "description" => "Serviço Logistico",
                                        "tax" => 0,
                                        "price" => $delivery['delivery']['deliveryPrice'],
                                        "quantity" => 1,
                                        "discount" => 0,
                                        "retension" => 0,
                                        "productType" => "Unidade",
                                        "exemption_code" => "M10",
                                    ]
                                ]
                            ])->json();

                            Log::info("CreateInvoive", [$logisticPartnerInvoice]);

                        }
                    }

                    Log::info("CreateInvoive", [$pbClient, $artistPb, $logisticPartnerInvoice]);
                }
            }
        } catch (\Throwable $th) {
            Log::info("error catch", [$th->getMessage()]);
        }
    }
}