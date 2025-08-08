<?php

namespace App\Services;

use App\Jobs\StoreVisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisitorService
{
    /**
     * Regista visitante a partir da Request. Se a queue estiver configurada como "sync" executa o job imediatamente.
     */
    public function registerFromRequest(Request $request, $company)
    {
        try {
            $userAgent = $request->header('User-Agent') ?? '';
            $ip = $request->ip() ?? '0.0.0.0';
            $companyName = $company->companyname ?? $company->name ?? null;
            $companyId = $company->id ?? null;

            $job = new StoreVisitor($userAgent, $ip, $companyName, $companyId);

            // Se estiveres em dev e com QUEUE_CONNECTION=sync este bloco executa de imediato
            if (config('queue.default') === 'sync') {
                // Executa de forma síncrona (útil para desenvolvimento sem worker)
                $job->handle();
            } else {
                dispatch($job); // Assíncrono — certifica-te que tens um worker rodando em produção
            }
        } catch (\Throwable $th) {
            Log::error('VisitorService@registerFromRequest: ' . $th->getMessage());
        }
    }
}