<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $profile = User::where("company_id", auth()->user()->company_id)->get();
        return view("sbadmin.profile.index", compact("profile"));
    }

    public function updateProfile(Request $request){
        try {
           $credential = User::find($request->id);

           $credential->name = $request->name;
           $credential->email = $request->email;
           $credential->password = Hash::make($request->password);

           $credential->save();
           return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
