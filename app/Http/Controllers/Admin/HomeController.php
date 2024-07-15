<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pacote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $shopping = pacote::where("pacote", "Shopping")
        ->where("company_id", auth()->user()->company_id)->first();
        return view("sbadmin.home", compact("shopping"));
    }
}
