<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InvoiceXzero
{
    /*
    * Emissão da factura no xzero
    */
    public static function createInvoice($token, $type, $customer, $paymentType, $items)
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$token}",
        ])->post('https://xzero.live/api/invoice/create', [
            "isBackoffice" => "0",
            "type" => $type,
            "customerName" => $customer["name"],
            "customerPhone" => $customer["phone"],
            "taxpayerNumber" => $customer["taxPayer"],
            "customerEmail" => $customer["email"],
            "customerAddress" => $customer["address"],
            "paymentType" => $paymentType,
            "items" => $items
        ])->json();
    }
}