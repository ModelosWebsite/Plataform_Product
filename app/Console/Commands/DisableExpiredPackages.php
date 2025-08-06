<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{pacote, company};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DisableExpiredPackages extends Command
{
    protected $signature = 'pacotes:desativar-expirados';
    protected $description = 'Desativa os pacotes que passaram da data de validade';

    public function handle()
    {
        try {
                DB::transaction(function () {
                    $expiredPackages = Pacote::where('is_active', true)
                        ->whereDate('end_date', '<', Carbon::today())
                        ->get();

                    foreach ($expiredPackages as $pacote) {
                        $pacote->update(['is_active' => false]);

                        $company = Company::find($pacote->company_id);
                        if ($company) {
                            $company->update(['payment_type' => 'Referência']);
                        }
                    }
                });
                \Log::info("Pacotes expirados desativados com sucesso.");
        } catch (\Throwable $th) {
            \Log::error("Erro ao desativar pacotes expirados: " . $th->getMessage());
        }
    }
}