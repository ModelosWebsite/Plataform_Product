<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    //
    public function heroview()
    {
        $hero = hero::where("company_id", auth()->user()->company_id)->get();
        return view("sbadmin.hero",
            compact("hero")
        );
    }

    public function heroSave(Request $request)
    {
        try {      
        $data = new hero();
        $company_id = auth()->user()->company_id;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->company_id = $company_id;
       
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->img = $profileImage;
        }
        $data->save();

        return redirect()->back()->with('success', 'Informações do Hero Registrados');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function heroUpdate(Request $request, $id)
    {
        try {
            $data = hero::find($id);

            $data->title = $request->title;
            $data->description = $request->description;
            $company_id = auth()->user()->company_id;
            $data->company_id = $company_id;

            if($request->hasFile("image")){
                $file = $request->file("image");
                $extension = $file->getClientOriginalExtension();
                $filename = "hero" . "." . $extension;
                $file->move("image/", $filename);
                $data->img = $filename;
            }

            $data->update();
            return redirect()->back()->with("success", "Dados Actualizados");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function heroDelete($id)
    {
        try {
            $hero = hero::find($id);
            $hero->delete();
            return redirect()->back()->with("success", "Dados Eliminado");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
