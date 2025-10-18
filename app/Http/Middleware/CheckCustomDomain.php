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
        $host = $request->getHost();
        $path = $request->segment(1);
        $mainDomain = config('app.main_domain'); // exemplo: on.xzero.live

        // 1️⃣ Se não for o domínio principal -> tente encontrar como domínio personalizado
        if ($host !== $mainDomain) {
            $tenantDomain = CustomDomain::where('domain', $host)->first();

            if ($tenantDomain) {
                $company = company::where('id', $tenantDomain->company_id)->pluck('companyhashtoken')->first();
                App::instance('tenant', $company);
                return $next($request);
            }
        }else {
            $company = company::where('companyhashtoken', $path)->pluck('companyhashtoken')->first();
            if ($company) {
                App::instance('tenant', $company);
                return $next($request);
            }
        }
    }
}