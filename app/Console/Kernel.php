<?php

namespace App\Console;

use App\Jobs\{InvoiceGenerateTransferece, StoreVisitor};
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\DisableExpiredPackages;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new InvoiceGenerateTransferece)->everyMinute();
        $schedule->job(new StoreVisitor(request()->header(
            'User-Agent') ?? '',
             request()->ip() ?? '0.0.0.0',
            'NomeDaEmpresa', // ou busca do banco
            123 // ID da empresa
        ))->everyMinute();
        $schedule->command('pacotes:desativar-expirados')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
