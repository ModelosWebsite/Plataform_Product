<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Cache, Session};
use App\Models\Company;
use App\Services\VisitorService;
use Illuminate\Support\Facades\Log;

class CompanyContextService
{
    protected CompanyService $companyService;
    protected VisitorService $visitorService;

    public function __construct(CompanyService $companyService, VisitorService $visitorService)
    {
        $this->companyService = $companyService;
        $this->visitorService = $visitorService;
    }

    public function loadContext(?string $hash, Request $request, bool $registerVisit = false): ?Company
    {
        try {
            $company = $this->companyService->getByHash($hash ?? app('tenant'));

            if (!$company || $company->status !== 'active') {
                return null;
            }

            // Gerir sessão/cache
            Session::forget(['companyhashtoken', 'tokencompany', 'tokencompany']);
            Cache::forget('invoiceToken');

            Session::put('companyhashtoken', $company->companyhashtoken);
            Session::put('tokencompany', $company->companyhashtoken);
            Cache::put('invoiceToken', $company->companyhashtoken);

            if ($registerVisit) {
                $this->visitorService->registerFromRequest($request, $company);
            }

            return $company;
        } catch (\Throwable $th) {
            Log::error("Erro ao carregar contexto da empresa: " . $th->getMessage());
            return null;
        }
    }
}