<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ValidationxZero
{
    protected static string $url = "https://xzero.live/api/validation/";

    public static function sendValidationIdentify(array $validationForm, string $token): array
    {
        try {
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->post(self::$url."identity", $validationForm);

            // Podes verificar se a resposta foi bem-sucedida
            if ($response->successful()) {
                return [
                    "status" => true,
                    "message" => "Operação realizada com sucesso",
                    "data" => $response->json()
                ];
            }

            // Caso não tenha sucesso
            return [
                "status" => false,
                "message" => "Falha na requisição",
                "error" => $response->body(),
            ];

        } catch (\Throwable $th) {
            Log::error("ValidationxZero@sendValidationIdentify", [
                "message" => "Falha ao realizar operação",
                "error" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);

            return [
                "status" => false,
                "message" => "Erro interno no servidor",
            ];
        }
    }

    public function validCodeIdentify($code,$token)
    {
        try {
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $token
            ])->post(self::$url."verify", ["code" => $code]);

            // Podes verificar se a resposta foi bem-sucedida
            if ($response->successful()) {
                return [
                    "status" => true,
                    "message" => "Operação realizada com sucesso",
                    "data" => $response->json()
                ];
            }

            // Caso não tenha sucesso
            return [
                "status" => false,
                "message" => "Falha na requisição",
                "error" => $response->body(),
            ];

        } catch (\Throwable $th) {
            Log::error("ValidationxZero@validCodeIdentify", [
                "message" => "Falha ao realizar operação",
                "error" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);

            return [
                "status" => false,
                "message" => "Erro interno no servidor",
            ];
        }
    }
}