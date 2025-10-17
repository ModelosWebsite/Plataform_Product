<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HelpXzero 
{
    public static function getCategories()
    {   
        try { 
            // Chamada à API
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ])->get("https://xzero.live/api/help/category");

            if ($response->successful()) {
                $data = $response->json();

                Log::info('HelpXzero@getCategories', [
                    "categories" => $data
                ]);

                return $data;
            }

            Log::warning('HelpXzero@getCategories falhou', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

        } catch (\Throwable $th) {
            Log::error('Erro em HelpXzero@getCategories', [
                'exception' => $th->getMessage()
            ]);
            return [];
        }
    }

    public static function storeHelp(array $payload)
    {
        try {
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ])->post("https://xzero.live/api/help/center", $payload);

            if ($response->successful()) {

                Log::info('HelpXzero@storeCategory', ["payload" => $payload, "response" => $data]);

                return $response->json();
            }

            Log::warning('HelpXzero@storeCategory falhou', ['status' => $response->status(), 'body' => $response->body()]);

            return null;

        } catch (\Throwable $th) {
            Log::error('Erro em HelpXzero@storeCategory', [
                'exception' => $th->getMessage(),
                'payload' => $payload
            ]);
            return [];
        }
    }
}