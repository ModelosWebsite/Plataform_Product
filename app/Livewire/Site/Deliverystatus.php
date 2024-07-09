<?php

namespace App\Livewire\Site;

use App\Models\company;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Deliverystatus extends Component
{
    public $deliveries, $id;

    public function status()
    {
        try {
            $id = Request("id");
            //Acesso a API com um token
            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => $this->getCompany()->companytokenapi,
            ];

            $response = Http::withHeaders($headers)
            ->get("https://kytutes.com/api/deliveries?reference=$id");
            return collect(json_decode($response));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.site.deliverystatus', [
            "data" => $this->status()
        ])->extends("layouts.site.status");
    }

    public function getCompany()
    {
        return company::where("companyhashtoken", session("tokencompany"))->first();
    }
}
