<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Http;
use App\Services\SubCategoryKytutes;

class Subcategory extends Component
{
    use LivewireAlert;

    public $categoryId, $name, $token;

    public function getHeaders()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => "Bearer ".auth()->user()->company->companytokenapi,
        ];
    }

    public function mount()
    {
        $this->token = auth()->user()->company->companytokenapi;
        $sub = SubCategoryKytutes::getSubcategory($this->token);
    }

    public function getCategories()
    {   
        try { 
            //Chamada a API
            return Http::withHeaders($this->getHeaders())
            ->get("https://shop.xzero.live/api/categories")->json();

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function save()
    {
        try {
            $response = SubCategoryKytutes::saveSubcategory(
                $this->categoryId, 
                $this->name,
                auth()->user()->company->companytokenapi 
            );

            dd($response);

            \Log::info("subcategory", [
                "response" => $response
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

        } catch (\Throwable $th) {
            \Log::error("error@savesubcategory", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.subcategory', [
            "categories" => $this->getCategories(),
            "subcategories" => SubCategoryKytutes::getSubcategory($this->token)
        ]);
    }
}