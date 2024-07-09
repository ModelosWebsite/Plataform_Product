<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Termo;
use Illuminate\Http\Request;

class TermosController extends Controller
{
    public function privacyView(){
        $termos = Termo::where("company_id", 0)->get();
        return view("superadmin.termos.privacy", compact("termos"));
    }

    public function privacyStore(Request $request){
        try {
            $termos = new Termo();

            $termos->condition = $request->condition;
            $termos->privacy = $request->privacy;

            $termos->save();

            return response()->json();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erros de Validações');
        }
    }
}
