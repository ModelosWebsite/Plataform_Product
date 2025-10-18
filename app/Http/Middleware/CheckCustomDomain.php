<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{CustomDomain, company};
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class CheckCustomDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost(); // exemplo: cliente.meusaas.com ou lavandariadasilva.com
        $path = $request->segment(1); // exemplo: "cliente" em meusaas.com/cliente
        $mainDomain = config('app.main_domain'); // meusaas.com

        $company = null;
        
        // 1️⃣ Verifica domínio personalizado
        $tenant = CustomDomain::where('domain', $host)->first();
        $companyTenant = company::where("id", $tenant->company_id)->select("companyhashtoken")->first();
        
        // 3️⃣ Se não tiver domínio personalizado, tenta path
        if (!$company && $path) {
            $company = company::where('companyhashtoken', $path)->first();
        }

        // Guarda o tenant atual em uma singleton
        App::instance('tenant', $company ?? $companyTenant);

        // Define o tenant na URL base (para links internos)
        URL::defaults(['tenant' => $company->companyhashtoken]);

        return $next($request);
    }
}