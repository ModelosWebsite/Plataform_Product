<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SubCategoryKytutes 
{
    public static function saveSubcategory($categoryId, $subcategory, $token)
    {
        try {

            return Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer ". $token
            ])->post("https://shop.xzero.live/api/subcategories",[
                "category_id" => $categoryId,
                "name" => $subcategory
            ])->json();

        } catch (\Throwable $th) {
            \Log::error("saveSubcategory", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    }

    public static function getSubcategory($token)
    {
        try {

            return Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer ". $token
            ])->get("https://shop.xzero.live/api/subcategories")->json();

        } catch (\Throwable $th) {
            \Log::error("saveSubcategory", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    }
}