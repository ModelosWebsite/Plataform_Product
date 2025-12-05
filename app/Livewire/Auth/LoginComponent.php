<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class LoginComponent extends Component
{
    public $email, $password;
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    
    public function login()
    {
        //dd($this->email,$this->password);
        $this->validate();
        
        try {
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                session()->regenerate();

                $user = Auth::user();
                

                
                if ($user->role === "Administrador") {
                    return $user->is_verified != 0
                    ? redirect()->route("plataform.product.admin.index")
                    : redirect()->route("site.verify.email");
                }

                if ($user->role === "SuperAdmin") {
                    return redirect()->route("super.admin.index");
                }
                
                // fallback se nenhum papel bater
                return redirect()->route("plataform.product.login.view");
            } else {
                $this->addError('auth', 'Credenciais incorretas');
            }
        } catch (\Throwable $th) {
            \Log::error("authLogin@login", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            $this->addError('auth', 'Erro interno ao tentar login.');
        }
    }
    
    
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route("plataform.product.login.view");
    }
    
    #[Layout("layouts.auth.app")]
    public function render()
    {
       
        return view('livewire.auth.login-component');
    }
}