<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{pacote, Payment};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivePackages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            DB::transaction(function () {
                // 1️⃣ Buscar pacotes inativos e vencidos
                $packages = pacote::where('is_active', false)
                ->whereDate('end_date', '>=', Carbon::today())->get();

                \Log::info("Pacotes Por activar", [
                    "message" => $packages
                ]);

                foreach ($packages as $package) {
                    // 2️⃣ Verificar pagamento associado
                    $payment = Payment::find($package->payment_id);

                    \Log::info("Schedule@Pagamentos", [
                        "message" => $payment
                    ]);

                    // 3️⃣ Se existir pagamento processado, ativar pacote
                    if ($payment->status === "processado") {
                        $package->update(['is_active' => true]);
                    }
                }
            });
        } catch (\Throwable $th) {
            \Log::error("Schedule@Pacotes", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    }
}
