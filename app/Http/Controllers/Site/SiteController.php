<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\{
    CompanyService,
    VisitorService,
    CompanyContextService,
    CompanyViewBuilderService
};
use Illuminate\Support\Facades\Log;
use Darryldecode\Cart\Facades\CartFacade;

class SiteController extends Controller
{
    protected CompanyContextService $contextService;
    protected CompanyViewBuilderService $viewBuilder;

    public function __construct(
        CompanyContextService $contextService,
        CompanyViewBuilderService $viewBuilder
    ) {
        $this->contextService = $contextService;
        $this->viewBuilder = $viewBuilder;
    }

    public function index(string $companyHash = null, Request $request)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request, registerVisit: true);
            if (!$company) return view('disable.App');

            $data = app(CompanyService::class)->getCompanyDataForHome($company);
            $dataView = $this->viewBuilder->buildViewData($company, $data);
            $view = $this->viewBuilder->resolveView($company, 'home');

            return view($view, $dataView);
        } catch (\Throwable $th) {
            Log::error("SiteController@index", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);

            return [];
        }
    }

    public function getShopping(string $companyHash  = null, Request $request)
    {
        try {
            //code...
            $company = $this->contextService->loadContext($companyHash, $request);
            if (!$company) abort(404);
            
            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'shopping');

            return view($view, $dataView);
        } catch (\Throwable $th) {
            Log::error("SiteController@getShopping", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);            
            return [];
        }
    }

    public function getShoppingCart(string $companyHash  = null, Request $request)
    {
        try {
            //code...
            $company = $this->contextService->loadContext($companyHash, $request);
            if (!$company) abort(404);

            if (CartFacade::getContent()->count() <= 0) {
                return redirect()->route('plataforma.produto.shopping', ['company' => $company->companyhashtoken]);
            }

            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'shopping-cart');

                return view($view, $dataView);
        } catch (\Throwable $th) {
            Log::error("SiteController@getShoppingCart", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            return [];
        }
    }
}