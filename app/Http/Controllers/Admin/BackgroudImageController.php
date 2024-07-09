<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fundo;
use Illuminate\Http\Request;

class BackgroudImageController extends Controller
{
        //imagens de funddo
        public function index(){
            $fundo = Fundo::where("company_id", auth()->user()->company_id)->get();
            return view("sbadmin.fundo", compact("fundo"));
        }
    
        public function imagebackgroundstore(Request $request)
        {
            try {
                $fundo = new Fundo();
    
                $fundo->tipo = $request->tipo;
                $fundo->company_id = auth()->user()->company_id;
    
                if ($request->hasFile("image")) {
                    //$destinationPath = "public/image";
                    $image = $request->file("image");
                    //$imageName = $image->getClientOriginalName(); 
                    $path = $request->file("image")->store("uploads/fundo"); //podes meter uploads/retangulo ou quadrado
        
                    $fundo->image = $path;
                }
                $fundo->save();
    
                return redirect()->back();
    
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function imageBackgroundUpdate(Request $request){
            try {
                $fundo = Fundo::find($request->id);
    
                if ($request->hasFile("image")) {
                    //$destinationPath = "public/image";
                    $image = $request->file("image");
                    //$imageName = $image->getClientOriginalName(); 
                    $path = $request->file("image")->store("uploads/fundo"); //podes meter uploads/retangulo ou quadrado
        
                    $fundo->image = $path;
                }
                $fundo->save();
                return redirect()->back();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function imageBackgroundDelete($id)
        {
            try {
                $imageBackground = Fundo::find($id);
                $imageBackground->delete();
                return redirect()->back();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
}
