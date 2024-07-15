<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Element;
use App\Models\pacote;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    //
    public function index()
    {
        $shopping = pacote::where("pacote", "Shopping")
        ->where("company_id", auth()->user()->company_id)->first();
        $elements = Element::where("company_id", auth()->user()->company_id)->get();
        return view("sbadmin.elements.app", compact("elements", "shopping"));
    }

    public function storeElement(Request $request)
    {
        try {
            $elements = new Element();
   
            $elements->element = $request->element;
            $elements->level = $request->qtd;
            $elements->company_id = auth()->user()->company_id;
   
            $elements->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
