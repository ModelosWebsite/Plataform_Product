<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\pacote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $shopping = null;
        
        $company = company::where("id", auth()->user()->company_id)->first();
        $shoppingValid = null;
             $shoppingValid = Http::withHeaders([
                 'Accept' => 'application/json',
                 'Authorization' => 'Bearer ' . $company->token_xzero ?? '',
             ])->post("http://127.0.0.2:8000/api/validation/show")->json();
            
            
        return view("sbadmin.home", compact("shopping", "shoppingValid"));
    }
}