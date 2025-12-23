<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\{CompanyService,VisitorService,CompanyContextService,CompanyViewBuilderService, ValidAccount};
use Illuminate\Support\Facades\Log;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Http;

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

    public function index(Request $request,?string $companyHash = null)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request, registerVisit: true);

            if (!$company) return view('errors.404');

            $data = app(CompanyService::class)->getCompanyDataForHome($company);
            $dataView = $this->viewBuilder->buildViewData($company, $data);
            $view = $this->viewBuilder->resolveView($company, 'home');

            $shoppingValid = ValidAccount::getValideted($company->token_xzero ?? "");

            return view($view, $dataView, ['shoppingValid' => $shoppingValid]);

        } catch (\Throwable $th) {
            Log::error("SiteController@index", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);

            return [];
        }
    }

    public function getShopping(Request $request, ?string $companyHash  = null)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request);
            if($company->status === 'inactive'){
                return view('disable.app');
            }
            if (!$company) abort(404);
            
            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'shopping');
            
            $shoppingValid = ValidAccount::getValideted($company->token_xzero ?? "");

            return view($view, $dataView, ['shoppingValid' => $shoppingValid]);
        } catch (\Throwable $th) {
            Log::error("SiteController@getShopping", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);            
            return [];
        }
    }

    public function getShoppingCart(Request $request, ?string $companyHash  = null)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request);
            if (!$company) abort(404);

            if (CartFacade::getContent()->count() <= 0) {
                return redirect()->route('plataforma.produto.shopping', ['company' => $company->companyhashtoken]);
            }

            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'shopping-cart');

            $shoppingValid = ValidAccount::getValideted($company->token_xzero ?? "");

            return view($view, $dataView, ['shoppingValid' => $shoppingValid]);
        } catch (\Throwable $th) {
            Log::error("SiteController@getShoppingCart", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            return [];
        }
    }

    public function getAppointment(Request $request, ?string $companyHash  = null)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request);
            if (!$company) abort(404);

            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'marking');

            $shoppingValid = ValidAccount::getValideted($company->token_xzero ?? "");


            return view($view, $dataView, ['shoppingValid' => $shoppingValid]);
        } catch (\Throwable $th) {
            Log::error("SiteController@getShoppingCart", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            return [];
        }
    }

    public function getCalendarAppointment(Request $request, ?string $companyHash  = null)
    {
        try {
            $company = $this->contextService->loadContext($companyHash, $request);
            if (!$company) abort(404);

            $dataView = $this->viewBuilder->buildViewData($company);
            $view = $this->viewBuilder->resolveView($company, 'calendar');

            $shoppingValid = ValidAccount::getValideted($company->token_xzero ?? "");

            return view($view, $dataView, ['shoppingValid' => $shoppingValid]);
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