<?php

namespace App\Livewire\Site;

use App\Models\company;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Http;

class Shopping extends Component
{
    use LivewireAlert;
    public $category, $company,$selectedCategory, $categoria, $itemid;

    public function render()
    {
        return view('livewire.site.shopping',[
            "getCollectionsItens" => $this->getItems($this->category),
            'categories' => $this->getCategories()
        ]);
    }

    public function getCompany()
    {
        return company::where("companyhashtoken", session("tokencompany"))->first();
    }

    //Dados de autenticação a API
    public function getHeaders()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => $this->getCompany()->companytokenapi,
        ];
    }
    
    //Pegar todas as categorias 
    public function getCategories()
    {
        try {
            //Chamada a API
            $response = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/categories");
    
            return json_decode($response, true);
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

   //Pegar os Itens pertencentes a categoria selecionada
   public function getItems($category)
   {
       try {
           if ($category) {
               $this->category = $category;
               //Chamada a API
               $response = Http::withHeaders($this->getHeaders())
               ->get("https://kytutes.com/api/items?category=$category");   
               return collect(json_decode($response,true));
           }else{
               $this->category = $category;

               $response = Http::withHeaders($this->getHeaders())
               ->get("https://kytutes.com/api/items");
               return collect(json_decode($response,true));   
           }
       } catch (\Throwable $th) {
           $this->alert('error', 'ERRO', [
               'toast'=>false,
               'position'=>'center',
               'showConfirmButton' => true,
               'confirmButtonText' => 'OK',
               'text'=>'Falha ao realizar operação'
           ]);
       }
   }

    //adicionar no carrinho
    public function addToCart($itemid)
    {
        try {
            $getItemCart = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/items?description=$itemid");

            $product = Collect(json_decode($getItemCart,true));

            Cart::add(array(
                'id' => $product[0]["reference"],
                'name' => $product[0]["name"],
                'price' => $product[0]["price"],
                'quantity' => 1,
            ));

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'timer' => '1000',
                'text'=>'Item '.$product[0]["name"].', adicionado'
            ]);
            return;
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }
}