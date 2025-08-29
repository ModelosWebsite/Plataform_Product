<?php

namespace App\Livewire\Auth;

use App\Mail\auth\reset;
use App\Models\User;
use Illuminate\Support\Facades\{DB, Hash};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResetPassword extends Component
{
    use LivewireAlert;
    public $email;
    
    public function render()
    {
        return view('livewire.auth.reset-password')->layout("layouts.auth.app");
    }

    public function resetPassword()
    {
    if (empty($this->email)) {
        $this->alert('warning', 'AVISO', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'OK',
            'text' => 'Por favor, insira um endereço de email válido.'
        ]);
        return;
    }

    DB::beginTransaction();
    try {
        $userFinded = User::where('email', '=', $this->email)->first();

        if (!$userFinded) {
            $this->alert('warning', 'AVISO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Não existe uma conta associada a este email.'
            ]);
            return;
        }

        $newPasswordRandom = rand(1000000, 5000000);
        $userFinded->password = Hash::make($newPasswordRandom);
        $userFinded->save();

        if ($userFinded != null) {
            Mail::to($this->email)->send(new reset($newPasswordRandom));

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'time' => 5000,
                'text' => 'Verifique seu email, foi enviada sua nova senha de acesso.'
            ]);

            DB::commit();
        } else {
            DB::rollBack();
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao enviar o email com a nova senha. Tente novamente.'
            ]);
        }
        
    } catch (\Throwable $th) {
        \Log::error('Erro ao resetar a senha: ' . $th->getMessage());
        DB::rollBack();
        $this->alert('error', 'ERRO', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'OK',
            'text' => 'Falha ao realizar operação. Erro: ' . $th->getMessage()
        ]);
    }
}
}