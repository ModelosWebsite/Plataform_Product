<?php

namespace App\Services;

use Illuminate\Support\Facades\{Http, Log};

class ValidAccount
{
    public static function getValideted($token)
    {
        try {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token ?? '',
            ])->post("http://127.0.0.1:8000/api/validation/show")->json() ?? null;
        } catch (\Throwable $th) {
            Log::error([
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    } 
}