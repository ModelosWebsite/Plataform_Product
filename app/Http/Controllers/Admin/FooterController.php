<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FooterController extends Controller
{
    //
    public function index()
    {
        $footer = contact::where("company_id", auth()->user()->company_id)->get();
        return view("sbadmin.footer",
            compact("footer")
        );
    }

    public function contactStore(Request $request)
    {
        try {
            $dados = new contact();

            $dados->endereco = $request->endereco;
            $dados->telefone = $request->telefone;
            $dados->email = $request->email;
            $dados->atendimento = $request->atendimento;
            $dados->company_id = auth()->user()->company_id;
    
            $dados->save();
    
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function actualizarContact(Request $request, $id)
    {
        try {
            contact::where(["id" => $id])->update([
                "telefone" => $request->telefone,
                "endereco" => $request->endereco,
                "atendimento" => $request->atendimento,
                "email" => $request->email,
                "id" => $request->id,
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function contactDelete($id)
    {
        try {
            $contact = contact::find($id);
            $contact->delete();
            Alert::success("Eliminado");
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}