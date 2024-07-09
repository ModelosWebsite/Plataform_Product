<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Company\SendEmail;
use App\Models\{About, Color, company, CompanyTerm, contact, Detail, Element, Fundo, hero, infowhy, pacote, Produt, Termo, Termpb_has_Company, TermsCompany};
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
    //exibir a pagina inicial
    public function index($company)
    {
        $data = $this->getCompany($company);
        if ($data && $data->status === 'enable') 
        {
            $hero = hero::where("company_id", $data->id)->get();
            $products = Produt::where("company_id", $data->id)->get();
            $info = infowhy::where("company_id", $data->id)->get();
            $details = Detail::where("company_id", $data->id)->get();
            $about = About::where("company_id", $data->id)->get();
            $contacts = contact::where("company_id", $data->id)->get(); 
            $companyName = company::where("companyhashtoken", $company)->first();
            $product = Element::where("company_id", $data->id)->
            where("element", "Produtos")->first();
            $experiencia = Element::where("company_id", $data->id)->
            where("element", "Experiência")->first();
            $parceiros = Element::where("company_id", $data->id)->
            where("element", "Parceiros")->first();
            $clients = Element::where("company_id", $data->id)->
            where("element", "Clientes")->first();
            $shopping = pacote::where("company_id", isset($data->id) ? $data->id : "")
            ->where("pacote", "Shopping")->first();
            $WhatsApp = pacote::where("company_id", isset($data->id) ? $data->id : "")
            ->where("pacote", "WhatsApp")->first();
            $phonenumber = contact::where("company_id", isset($data->id) ? $data->id : "")->first();
            
            $companies = Termpb_has_Company::where("company_id", isset($data->id) ? $data->id : "")->with('termsPBs')->first();

            $termos = TermsCompany::where("company_id", isset($data->id) ? $data->id : "")->first();
            
            // $api = Http::timeout(5)->post(
            //     "https://karamba.ao/api/anuncios",
            //     ["key" => "wRYBszkOguGJDioyqwxcKEliVptArhIPsNLwqrLAomsUGnLoho"]
            // );

            // $apiArray = $api->json();

            return view("site.pages.home",
            [
                "hero" => $hero,
                "info" => $info,
                "about" =>$about,
                "details" => $details,
                "products" => $products,
                "experiencia" => $experiencia,
                "parceiros" => $parceiros,
                "product" => $product,
                "clients" => $clients,
                "shopping" => $shopping,
                "phonenumber" => $phonenumber,
                "WhatsApp" => $WhatsApp,
                "companies" => $companies,
                "termos" => $termos,
                //"apiArray" => $apiArray,
                "contacts" => $contacts,
                "companyName" => $companyName,
                "color" => $this->colors($company),
                "fundoAbout" => $this->fundoAbout($company),
                "fundo" => $this->fundo($company),
                "start" => $this->start($company)
            ]);
        }else
        {
            return view("disable.App");
        }
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
}