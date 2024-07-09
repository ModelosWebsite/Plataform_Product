<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function loginview(){
        return view("login.app");
    }

    public function login(Request $request){
        $credentials = $this->validate($request, [
            "email" => ["required"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()-> role == "Administrador") {
                return redirect()->route("plataform.product.admin.index");
            }if (Auth::user()-> role == "SuperAdmin") {
                return redirect()->route("super.admin.index");
            }
        }else{
            return redirect()->back()->with('error', 'Credenciais Incorretas');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("plataform.product.login.view");
    }
}
