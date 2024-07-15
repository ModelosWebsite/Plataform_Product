<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\pacote;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
        //Alteração de cores nos websites
        public function index(){
            $colors = Color::all();
            $shopping = pacote::where("pacote", "Shopping")
        ->where("company_id", auth()->user()->company_id)->first();
            return view("sbadmin.color", compact("colors", "shopping"));
        }

        public function storecolor(Request $request){
            try {
                $company_id = Auth()->user()->company_id;
    
                $countSelectColor = Color::where("company_id", $company_id)->first();
    
                if (isset($countSelectColor)) {
                    $countSelectColor->codigo = $request->codigo;
                    $countSelectColor->letra = $request->letra;
                    $countSelectColor->company_id = $company_id;
                    $countSelectColor->save();
                } else {
                    $color = new Color();
                    $color->codigo = $request->codigo;
                    $color->letra = $request->letra;
                    $color->company_id = $company_id;
                    $color->save();
                }
                
                return redirect()->back()->with("success", "Cores adicionadas");
            } catch (\Throwable $th) {
                return redirect()->back()->with("error", "Não é possivel"); 
            }
        }
}
