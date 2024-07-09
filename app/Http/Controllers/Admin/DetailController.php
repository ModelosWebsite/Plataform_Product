<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
        //Infromações sobre os detalhes
        public function index(){
            $infos = Detail::where("company_id", auth()->user()->company_id)->get();
            return view("sbadmin.skill", compact("infos"));
        }
    
        public function storeDetail(Request $request){
             try {
                //code...
                $data = new Detail();
    
                $data->title = $request->title;
                $data->description = $request->description;
                $data->company_id = auth()->user()->company_id;
        
                $data->save();

                return redirect()->back();
             } catch (\Throwable $th) {
                //throw $th;
             }
        }

        public function actualizarDetalhes(Request $request, $id){
            Detail::where(["id" => $id])->update([
                "title" => $request->title,
                "description" => $request->description,
                "id" => $request->id,
            ]);
            return redirect()->back();
        }

        public function detailDelete($id)
        {
            try {
                $detail = Detail::find($id);
                $detail->delete();
                return redirect()->back();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
}
