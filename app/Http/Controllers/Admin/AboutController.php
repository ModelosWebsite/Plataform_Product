<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\pacote;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        $data = About::where("company_id", auth()->user()->company_id)->get();
        $shopping = pacote::where("pacote", "Shopping")
        ->where("company_id", auth()->user()->company_id)->first();
        return view("sbadmin.about",
            compact("data", "shopping")
        );
    }

    public function storeAbout(Request $request)
    {
        try {
            $data = new About();

            $data->p1 = $request->p1;
            $data->p2 = $request->p2;
            $data->company_id = auth()->user()->company_id;
    
            $data->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function actualizarAbout(Request $request)
    {
        try {
            About::where(["id" => $request->id])->update([
                "p1" => $request->p1,
                "p2" => $request->p2,
            ]);

            return redirect()->back()->with("success", "Sobre Actualizado");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function sobreDelete($id)
    {
        try {
            $hero = About::find($id);
            $hero->delete();
            return redirect()->back()->with("success", "Dados Eliminado");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
