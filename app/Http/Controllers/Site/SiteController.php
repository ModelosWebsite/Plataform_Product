<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Company\SendEmail;
use App\Models\{About, Color, company, CompanyTerm, contact, Detail, Element, Fundo, hero, infowhy, pacote, Produt, Termo, Termpb_has_Company, TermsCompany, visitor};
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;

class SiteController extends Controller
{
    public function index($company)
    {
        $data = $this->getCompany($company);
        
        if (!$data || $data->status !== 'active') {
            return view("disable.App");
        }
        
        $companyId = $data->id;
        
        $elements = ["Produtos", "Experiência", "Parceiros", "Clientes"];
        $elementData = Element::where("company_id", $companyId)
        ->whereIn("element", $elements)->get()->keyBy("element");
        
        $packages = ["Shopping", "WhatsApp"];
        $packageData = pacote::where("company_id", $companyId)
        ->whereIn("pacote", $packages)->get()->keyBy("pacote");
        
        $companyName = company::where("companyhashtoken", $company)->first();
        $this->getVisitor($companyName);
        
        return view("site.pages.home", [
            "hero" => hero::where("company_id", $companyId)->get(),
            "products" => Produt::where("company_id", $companyId)->get(),
            "info" => infowhy::where("company_id", $companyId)->get(),
            "details" => Detail::where("company_id", $companyId)->get(),
            "about" => About::where("company_id", $companyId)->get(),
            "contacts" => contact::where("company_id", $companyId)->get(),
            "product" => $elementData["Produtos"] ?? null,
            "experiencia" => $elementData["Experiência"] ?? null,
            "parceiros" => $elementData["Parceiros"] ?? null,
            "clients" => $elementData["Clientes"] ?? null,
            "shopping" => $packageData["Shopping"] ?? null,
            "WhatsApp" => $packageData["WhatsApp"] ?? null,
            "phonenumber" => contact::where("company_id", $companyId)->first(),
            "companies" => Termpb_has_Company::where("company_id", $companyId)->with('termsPBs')->first(),
            "termos" => TermsCompany::where("company_id", $companyId)->first(),
            "companyName" => $companyName,
            "color" => $this->colors($company),
            "fundoAbout" => $this->fundoAbout($company),
            "fundo" => $this->fundo($company),
            "start" => $this->start($company)
        ]);
        
    }


    public function start($company)
    {
        $data = company::where("companyhashtoken", $company)->first();
        $start = Fundo::where("tipo", "Start")
        ->where("company_id", $data->id)->first();
        return $start;
    }

    public function colors($company)
    {
        $data = company::where("companyhashtoken", $company)->first();
        $color = Color::where("company_id", $data->id)->first();
        return $color;
    }

    public function fundoAbout($company)
    {
        $data = company::where("companyhashtoken", $company)->first();
        $about = Fundo::where("tipo", "AboutMain")
        ->where("company_id", $data->id)->first();
        return $about;
    }

    public function fundo($company)
    {
        $data = company::where("companyhashtoken", $company)->first();
        $about = Fundo::where("tipo", "AboutSecund")
        ->where("company_id", $data->id)->first();
        return $about;
    }

    public function sendEmail($company)
    {
        try {
            $companyEmail = company::where("companyhashtoken", $company)->first();
            
            $email = "albertocativa653@gmail.com";
            Mail::to($companyEmail->companyemail)->send(new SendEmail($email, $companyEmail));
            return "enviado";
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getShopping($company)
    {
        try {
            $shopping = pacote::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id: "")
            ->where("pacote", "Shopping")->first();
            $WhatsApp = pacote::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id : "")
            ->where("pacote", "WhatsApp")->first();
            $phonenumber = contact::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id : "")->first();
            $companyName = $this->getCompany($company);
            session()->put("tokencompany", $companyName->companyhashtoken);

            return view("site.pages.shopping", [
                "companyName" => $companyName,
                "shopping" => $shopping,
                "WhatsApp" => $WhatsApp,
                "phonenumber" => $phonenumber,
                "color" => $this->colors($company),
            ]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getShoppingCart($company)
    {
        try {
            if (CartFacade::getContent()->count() > 0) {
                $shopping = pacote::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id: "")
            ->where("pacote", "Shopping")->first();
            $WhatsApp = pacote::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id : "")
            ->where("pacote", "WhatsApp")->first();
            $phonenumber = contact::where("company_id", isset($this->getCompany($company)->id) ? $this->getCompany($company)->id : "")->first();
            $companyName = $this->getCompany($company);
            //session()->put("tokencompany", $companyName->companyhashtoken);
            return view("site.pages.carrinho", [
                "companyName" => $companyName,
                "shopping" => $shopping,
                "WhatsApp" => $WhatsApp,
                "phonenumber" => $phonenumber,
                "color" => $this->colors($company),
            ]);
            } else {
                return redirect()->back()->with("info", "Carrinho Vazio");
            }  
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getCompany($company)
    {
        try {
            return company::where("companyhashtoken", $company)->first();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function getVisitor($companyName)
    {
        // Capturar informações da requisição
        $userAgent = request()->header('User-Agent');

        // Usar a biblioteca Jenssegers/Agent para analisar o user agent
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        //salvar os dados no banco
        $visitors = new visitor();

        $visitors->ip = request()->ip();
        $visitors->browser = $agent->browser();
        $visitors->system = $agent->platform();
        $visitors->device = $agent->device();
        
        if ($agent->isDesktop()) {
            $visitors->typedevice = "Computador";
        }if ($agent->isPhone()) {
            $visitors->typedevice = "Telefone";
        }if ($agent->isTablet()) {
            $visitors->typedevice = "Tablet";
        }
        
        $visitors->company = $companyName->companyname;
        $visitors->save();
    }
}