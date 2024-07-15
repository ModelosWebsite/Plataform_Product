<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\infowhy;
use App\Models\pacote;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
        //Imformações das caracteristicas do site...
        public function index(){
            $infos = infowhy::where("company_id", auth()->user()->company_id)->get();
            $shopping = pacote::where("pacote", "Shopping")
            ->where("company_id", auth()->user()->company_id)->first();
            return view("sbadmin.projects", compact("infos", "shopping"));
        }
    
        public function questionUpdate(Request $request, $id){
            infowhy::where(["id" => $id])->update([
                "title" => $request->title,
                "description" => $request->description,
                "id" => $request->id,
            ]);
    
            return redirect()->back();
        }
    
        public function questionStore(Request $request){
            try {
                $data = new infowhy();
    
                $data->title = $request->title;
                $data->description = $request->description;
                $data->company_id = auth()->user()->company_id;
        
                $data->save();
        
                return redirect()->back();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function questionDelete($id)
        {
            try {
                $question = infowhy::find($id);
                $question->delete();
                return redirect()->back();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
}
