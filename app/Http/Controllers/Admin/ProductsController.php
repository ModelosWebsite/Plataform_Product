<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = Produt::where("company_id", auth()->user()->company_id)->get();
        return view("sbadmin.products.app", compact("products"));
    }

    public function storeProduct(Request $request)
    {
        try {
            $product = new Produt();
                
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->company_id = auth()->user()->company_id;
       
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = rand(2000, 3000) . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $product->image = $profileImage;
            }

            $product->save();
            //Alert::success("Produto Adicionado");
            return redirect()->back()->with("success", "Produto Adicionado");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }
    }

    public function updateProduct(Request $request)
    {
        try {
            $product = Produt::find($request->id);
            $product->title = $request->title;
            $product->price = $request->price;
            $product->description = $request->description;

            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = rand(2000, 3000) . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $product->image = $profileImage;
            }

            $product->update();
            return redirect()->back();
        } catch (\Throwable $th) {
            redirect()->back();
        }
    }

    public function productDelete($id)
    {
        try {
            $product = Produt::find($id);
            $product->delete();
            Alert::success("Produto Eliminado");
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
