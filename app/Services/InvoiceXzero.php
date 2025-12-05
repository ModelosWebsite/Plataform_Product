<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class InvoiceXzero
{
    /*
    * Emissão da factura no xzero
    */
    public static function createInvoice($token, $type, $customer, $paymentType, $items)
    {
        try {
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
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
        }
    }
}