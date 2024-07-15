<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\pacote;
use App\Models\Termpb;
use App\Models\Termpb_has_Company;
use App\Models\TermsCompany;
use Illuminate\Http\Request;

class ConditionsController extends Controller
{
    //chamar formulario
    public function conditionsView(){
        $company_id = auth()->user()->company_id;
        $termos = TermsCompany::where("company_id", $company_id)->get();
        $shopping = pacote::where("pacote", "Shopping")
        ->where("company_id", auth()->user()->company_id)->first();
        return view("sbadmin.conditions.main", compact("termos", "shopping"));
    }

    //Cadastrar as conditions
    //Create - save terms and privacity
    public function conditionsCreate(Request $request){
        try {
            $conditions = new TermsCompany();

            $conditions->privacity = $request->privacity;
            $conditions->term = $request->term;
            $conditions->company_id = auth()->user()->company_id;
            $conditions->save();

            if ($conditions) {
                return redirect()->back()->with("success", "Termo Criado");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Campos Vazios");
        }
    }

    public function termoStatus(Request $request)
    {
        try {
            $termPbs = Termpb::first();
            $termspb_has_company = new Termpb_has_Company();
            $termspb_has_company->company_id = auth()->user()->company_id;
            $termspb_has_company->termpb_id = $termPbs->id;
            $termspb_has_company->save();
        
            $company = company::find(auth()->user()->company_id);
            // Atualiza o estado baseado no valor do checkbox
            $company->status = $request->input('status') ? 'enable' : 'disable';
            $company->save();
        
            return redirect()->back()->with('success', 'Termos e Politicas Aceites');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro', $th->getMessage());
        }
    }
    
}