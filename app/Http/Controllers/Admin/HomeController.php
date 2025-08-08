<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pacote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $shopping = null;
        return view("sbadmin.home", compact("shopping"));
    }
}