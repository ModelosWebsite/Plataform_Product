<?php

namespace App\Services;

use App\Models\company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Request{
    /** metodo para verificar estados de encomendas encomendas */
    public static function verifyDeliveryStatus($status, $tokenShopping)
    {
        try {
            // Chamada à API para atualizar o status
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                'Authorization' => 'Bearer ' .$tokenShopping,
            ])->get("https://shop.xzero.live/api/deliveries", [
                'status' => $status
            ])->json();

            if ($response != null) {
                return $response;
            }
        } catch (\Throwable $th) {
           return response(["Erro"=>"Falha ao realizar operação"],400);
        }
    }

    public static function changeDeliveryStatus($reference, $tokenShopping)
    {
        DB::beginTransaction();
        try {
            // Chamada à API para atualizar o status
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                'Authorization' => 'Bearer ' .$tokenShopping,
            ])->put("https://shop.xzero.live/api/deliveries?reference=$reference", [
                'switch' => "estado"
            ])->json();

            return $response;
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
           return response(["Erro"=>"Falha ao realizar operação"],400);
     }
    }

    public static function getCompany($taxPayer)
    {
        try {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://xzero.live/api/company/show', [
                "TaxPayer" => $taxPayer,
            ])->json();
        } catch (\Throwable $th) {
        }
    }

    public static function validateTaxPayer($taxPayer)
    {
        try {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://shop.xzero.live/api/verify/nif', [
                "nif" => $taxPayer,
            ])->json();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}