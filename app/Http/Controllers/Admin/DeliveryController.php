<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pacote;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        try {
            $shopping = pacote::where("pacote", "Shopping")
            ->where("company_id", auth()->user()->company_id)->first();
            return view("sbadmin.delivery.app", compact("shopping"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}