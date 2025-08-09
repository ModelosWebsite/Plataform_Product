<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use App\Services\VisitorService;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    protected CompanyService $companyService;
    protected VisitorService $visitorService;

    public function __construct(CompanyService $companyService, VisitorService $visitorService)
    {
        $this->companyService = $companyService;
        $this->visitorService = $visitorService;
    }

    public function index(string $companyHash, Request $request)
    {
        // Remover da session
        session()->forget('companyhashtoken');
        // Remover do cache
        cache()->forget("invoiceToken");
        try {

            $company = $this->companyService->getByHash($companyHash);
            
            if ($company->status !== 'active') {
                return view('disable.App');
            }
            
            session()->put('companyhashtoken', $company->companyhashtoken);
            cache()->put("invoiceToken", $company->companyhashtoken, now()->addHours(2));

            // registra visita (job dispatched dentro do service)
            $this->visitorService->registerFromRequest($request, $company);

            $data = $this->companyService->getCompanyDataForHome($company);

            return view('site.pages.home', [
                'hero' => $company->heroes,
                'products' => $company->products,
                'info' => $company->infoWhy,
                'details' => $company->details,
                'about' => $company->about,
                'contacts' => $company->contacts,
                'product' => $data['elements']['Produtos'] ?? null,
                'experiencia' => $data['elements']['Experiência'] ?? null,
                'parceiros' => $data['elements']['Parceiros'] ?? null,
                'clients' => $data['elements']['Clientes'] ?? null,
                'whatsapp' => $company->packages->where('is_active', true)->where('package_name', 'Whatsapp')->first(),
                'phonenumber' => $company->contacts->first(),
                'companies' => $company->termpbHasCompany ? $company->termpbHasCompany->load('termsPBs') : null,
                'termos' => $company->termsCompany,
                'companyName' => $company,
                'color' => $company->color,
                'fundoAbout' => $company->fundos->where('tipo', 'AboutMain')->first(),
                'fundo' => $company->fundos->where('tipo', 'AboutSecund')->first(),
                'start' => $company->fundos->where('tipo', 'Start')->first()
            ]);

        } catch (\Throwable $th) {
            Log::error('SiteController@index error: ', [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            abort(404);
        }
    }

    public function getShopping(string $companyHash)
    {
        // Remover da session
        session()->forget('companyhashtoken');
        // Remover do cache
        cache()->forget("invoiceToken");
        cache()->forget("tokencompany");
        try {
            $company = $this->companyService->getByHash($companyHash);

            session()->put("tokencompany", $company->companyhashtoken);

            $shopping = $company->packages->firstWhere('pacote', 'Shopping');
            $whatsapp = $company->packages->firstWhere('pacote', 'WhatsApp');

            return view('site.pages.shopping', [
                'companyName' => $company,
                'shopping' => $shopping,
                'WhatsApp' => $whatsapp,
                'phonenumber' => $company->contacts->first(),
                'color' => $company->color
            ]);
        } catch (\Throwable $th) {
            Log::error('getShopping error: ' . $th->getMessage());
            abort(404);
        }
    }

    public function getShoppingCart(string $companyHash)
    {
        try {
            $company = $this->companyService->getByHash($companyHash);

            session()->put("tokencompany", $company->companyhashtoken);

            if (CartFacade::getContent()->count() <= 0) {
                return redirect()->route('plataforma.produto.shopping', ['company' => $company->companyhashtoken]);
            }

            $shopping = $company->packages->firstWhere('pacote', 'Shopping');
            $whatsapp = $company->packages->firstWhere('pacote', 'WhatsApp');

            return view('site.pages.carrinho', [
                'companyName' => $company,
                'shopping' => $shopping,
                'WhatsApp' => $whatsapp,
                'phonenumber' => $company->contacts->first(),
                'color' => $company->color
            ]);
        } catch (\Throwable $th) {
            Log::error('getShoppingCart error: ' . $th->getMessage());
            abort(404);
        }
    }
}