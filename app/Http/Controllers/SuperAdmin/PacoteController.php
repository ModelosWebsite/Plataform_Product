<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\pacote;
use Illuminate\Http\Request;

class PacoteController extends Controller
{
    //main page elements premium
    public function mainView(){
        $pacotes = pacote::all();
        $companies = company::all();
        return view("superadmin.pacote.main", 
        [
            "companies" => $companies,
            "pacotes" => $pacotes
        ]);
    }

    //atribuir elemto a empresa
    public function store(Request $request){
        try {
            $pacote = new pacote();

            $pacote->pacote = $request->pacote;
            $pacote->company_id = $request->company_id;

            $pacote->save();
            return redirect()->back()->with("success", "Elemento Adicionado");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Não é possivél");
        }
    }

    public function updatePacote(Request $request){
        pacote::where(["id" => $request->id])->update([
            "status" => $request->status,
            "id" => $request->id,
        ]);
        return redirect()->back()->with("success", "Elemento actualizado");
    }
}
