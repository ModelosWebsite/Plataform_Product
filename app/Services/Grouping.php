<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class Grouping 
{
    public static function getGrouping($type)
    {
        try {
            return Http::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ])->get("https://xzero.live/api/".$type)->json();
        } catch (\Throwable $th) {
            \Log::error("Agrupamentos", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    }
}