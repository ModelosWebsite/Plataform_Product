<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{pacote, company};
use Carbon\Carbon;

class DisableExpiredPackages extends Command
{
    protected $signature = 'pacotes:desativar-expirados';
    protected $description = 'Desativa os pacotes que passaram da data de validade';

    public function handle()
    {
        try {
            $package = pacote::where('is_active', true)
            ->whereDate('end_date', '<', Carbon::today())
            ->update(['is_active' => false]);

            // Atualiza os pacotes e percorre-os
            foreach ($packages as $pacote) {
                // Captura o company_id e atualiza o método
                $company = company::find($pacote->company_id);
                if ($company) {
                    $company->payment_type = 'Referência';
                    $company->save();
                }
            }

            \Log::info("Pacotes expirados desativados com sucesso.");
        } catch (\Throwable $th) {
            \Log::error("Erro ao desativar pacotes expirados: " . $th->getMessage());
        }
    }
}