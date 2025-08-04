<?php

namespace App\Livewire\Admin;

use App\Models\company;
use Illuminate\Support\Facades\{DB, Http};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LinkAccount extends Component
{
    public $mylocation;
    use LivewireAlert;

    public function render()
    {
        return view('livewire.admin.link-account', [
            'locationMap' => $this->getAllLocations()
        ]);
    }

    public function linkAccount()
    {
        // DB::beginTransaction();
        try {
            $company = company::find(auth()->user()->company->id);

            // Informações para a API kytutes
            $infoCompany = [
                "name" => $company->companyname,
                "nif" => $company->companynif,
                "phone" => 999999999,
                "email" => $company->companyemail,
                "province" => 'Luanda',
                "municipality" => $this->mylocation ,
                "address" => $this->mylocation,
                "image" => "default.png",
                "password" => $company->companyemail,
                "myLocation" => $this->mylocation,
                "isAxp" => 0
            ];

            // Informações para a API Xzero
            $infoXzero = [
                "companyname" => $company->companyname,
                "companynif" => $company->companynif,
                "companyregime" => "Exclusão(0%)",
                "companyphone" => 999999999,
                "companyalternativephone" => 999999999,
                "companyemail" => $company->companyemail,
                "companyprovince" => 'Luanda',
                "companymunicipality" => $this->mylocation,
                "companyaddress" => $this->mylocation,
                "password" => $company->companyemail,
                "companycountry" => "AOA"
            ];

            // //Chamada às APIs externas
            // $response = Http::withHeaders($this->getHeaders())
            // ->post("https://kytutes.com/api/create/company", $infoCompany)
            // ->json();


            if ($infoXzero != null) {
                $xzeroResponse = Http::withHeaders($this->getHeaders())
                ->post("https://xzero.ao/api/create/account", $infoXzero)
                ->json();

                //Atualizar tokens da empresa
                // $company->companytokenapi = $response['token'];
                $company->token_xzero = $xzeroResponse['apiToken'];
                $company->update();
                // DB::commit();

                $this->alert('success', 'Conta Vinculada', 
                [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                ]);
            }


        } catch (\Throwable $th) {
            // DB::rollBack();
            Log::info("message");
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }

    public function getHeaders()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
    }

    public function getAllLocations()
    {
        try {

            $response = Http::withHeaders([
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                ])->get("https://kytutes.com/api/location/map")->json();

            if ($response != null) {
                return $response;
            }
            
            return [];
        } catch (\Throwable $th) {
            return response("Erro ao buscar localizações", 500);
        }
    }
}