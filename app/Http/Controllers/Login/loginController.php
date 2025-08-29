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
       try {
            $credentials = $this->validate($request, [
                "email" => ["required"],
                "password" => ["required"]
            ]);

            if (Auth::attempt($credentials)) {
            
                $request->session()->regenerate();
                if (Auth::user()-> role == "Administrador") {
                    if (Auth::user()->email_verified_at != null) {
                        return redirect()->route("plataform.product.admin.index");
                    }else{
                        return redirect()->route("site.verify.email");
                    }
                }if (Auth::user()-> role == "SuperAdmin") {
                    return redirect()->route("super.admin.index");
                }
            }else{
                return redirect()->back()->with('error', 'Credenciais Incorretas');
            }
       } catch (\Throwable $th) {
            \Log::error("authLogin@Login", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
       }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("plataform.product.login.view");
    }
}
