<?php

namespace App\Livewire\Site;

use App\Models\company;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Deliverystatus extends Component
{
    public $deliveries, $id, $deliveryNumber;

    public function mount()
    {
        session()->put("tokencompany", Request("company"));
        \Log::info("deliveryStatus@mount@token", ["token" => session('tokencompany')]);
    }

    public function status()
    {
        try {
            $id = $this->deliveryNumber ?? session("idDelivery");
            //Acesso a API com um token
            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => $this->getCompany()->companytokenapi,
            ];

            $response = Http::withHeaders($headers)
            ->get("https://kytutes.com/api/deliveries", ['reference' => $id]);

            if ($id != null) {
                return collect(json_decode($response));
            }
            return collect();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setDelivery()
    {
        try {
            $this->deliveryNumber;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.site.deliverystatus', [
            "data" => $this->status()
        ])->layout("layouts.site.status");
    }

    public function getCompany()
    {
        return company::where("companyhashtoken", session("tokencompany"))->first();
    }
}
