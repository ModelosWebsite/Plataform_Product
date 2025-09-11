<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\{DB, Mail};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Mail\CreatedAccountMail;
use Illuminate\Http\Request;
use Livewire\Component;

class AccountVerifyComponent extends Component
{
    public $one, $two, $three, $four, $five, $six;

    use LivewireAlert;
    public function render()
    {
        return view('livewire.auth.account-verify-component')->layout('layouts.auth.verify');
    }

    public function resendCode()
    {
        try {
            $email = Request("email");

            if ($email) {
                $user = User::where('email',$email)->first();
                $newVerifyCode = rand(100000,500000);
                $user->verification_token = $newVerifyCode;
                $user->save();

                $emailInfo = [
                    "name" => $user->name,
                    "email" => $user->email,
                    "verification_token" => $newVerifyCode
                ];  

                Mail::to($email)->send(new CreatedAccountMail($emailInfo));

                $this->alert('success', 'SUCESSO', [
                    'position' => 'center',
                    'toast' => false,
                    'timer' => 2000,
                    'text' => 'Código de Verificação foi reenviado no seu e-mail',
                ]);
            }
        } catch (\Throwable $th) {
            \Log::error('Reenviar Código Verificação: ',[
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            $this->alert('error', 'FALHA', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => 'Falha ao realizar operação',
            ]);
        }
    }

    public function verifyAccount()
    {  
        $this->validate([
            'one' => 'required|numeric',
            'two' => 'required|numeric',
            'three' => 'required|numeric',
            'four' => 'required|numeric',
            'five' => 'required|numeric',
            'six' => 'required|numeric',
        ]);
        try {
            $code = $this->one.$this->two.$this->three.$this->four.$this->five.$this->six;
            $user = User::where('verification_token',$code)->first();
            
            if ($user) {
                $user->verification_token = null;
                $user->is_verified = true;
                $user->save();

                $this->alert('success', 'SUCESSO', [
                    'position' => 'center',
                    'toast' => false,
                    'timer' => 2500,
                    'text' => 'Conta verificada com sucesso',
                ]);

                return redirect()->route('plataform.product.login.view');
                
            }else{
                $this->alert('info', 'Atenção!', [
                    'position' => 'center',
                    'toast' => false,
                    'timer' => 2000,
                    'text' => 'Código Inválido',
                ]);
            }
        } catch (\Throwable $th) {
            \Log::error('Verificar Conta: ',[
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            $this->alert('error', 'FALHA', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => 'Falha ao realizar operação',
            ]);
        }
    }
}