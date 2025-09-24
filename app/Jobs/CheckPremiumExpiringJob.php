<?php

namespace App\Jobs;

use App\Models\Pacote;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckPremiumExpiringJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Executa o job.
     */
    public function handle()
    {
        // Buscar pacotes premium ativos
        $pacotes = Pacote::whereNotNull('premium_end')
            ->with('user') // garantir que traz a relação User
            ->get();

        foreach ($pacotes as $pacote) {
            $diasRestantes = now()->diffInDays($pacote->end_date, false);

            if ($diasRestantes === 15 && $pacote->user) {
                $email = $pacote->user->email;

                Mail::raw(
                    "Olá {$pacote->user->name},\n\nA sua assinatura premium expira em 15 dias.\n\nRenove agora para não perder os benefícios.\n\nLink: " . url('/plano/renovar'),
                    function ($message) use ($email) {
                        $message->to($email)
                        ->subject('Aviso: Sua assinatura premium expira em 15 dias');
                    }
                );
            }
        }
    }
}