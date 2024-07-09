<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
        //Alteração de cores nos websites
        public function index(){
            $colors = Color::all();
            return view("sbadmin.color", compact("colors"));
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
