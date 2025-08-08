<?php

namespace App\Jobs;

use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StoreVisitor implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public ?string $userAgent;
    public ?string $ip;
    public ?string $companyName;
    public ?int $companyId;

    public function __construct(?string $userAgent, ?string $ip, ?string $companyName, ?int $companyId)
    {
        $this->userAgent = $userAgent;
        $this->ip = $ip;
        $this->companyName = $companyName;
        $this->companyId = $companyId;
    }

    public function handle()
    {
        try {
            $agent = new Agent();
            $agent->setUserAgent($this->userAgent ?? '');

            $visitor = new Visitor();
            $visitor->ip = $this->ip ?? '0.0.0.0';
            $visitor->browser = $agent->browser() ?? 'Unknown';
            $visitor->system = $agent->platform() ?? 'Unknown';
            $visitor->device = $agent->device() ?? 'Unknown';

            $typedevice = 'Desconhecido';
            if ($agent->isDesktop()) $typedevice = 'Computador';
            if ($agent->isPhone()) $typedevice = 'Telefone';
            if ($agent->isTablet()) $typedevice = 'Tablet';

            $visitor->typedevice = $typedevice;
            $visitor->company = $this->companyName ?? null;

            // Se a tabela visitors tiver coluna company_id, define-a
            if (isset($visitor->company_id) && $this->companyId) {
                $visitor->company_id = $this->companyId;
            }

            $visitor->save();
        } catch (\Throwable $th) {
            Log::error('StoreVisitor@handle: ' . $th->getMessage());
        }
    }
}