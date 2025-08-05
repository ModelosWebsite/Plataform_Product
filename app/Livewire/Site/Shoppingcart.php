<?php

namespace App\Livewire\Site;

use App\Models\{company, Payment, BankAccount};
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shoppingcart extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $number = 0, $localizacao, $cartContent, $getTotal, $getSubTotal,
    $getTotalQuantity, $location, $cupon, $taxapb = 0, $finalCompra,
    $totalFinal = 0, $code, $delveryId, $receipt, $deliveryType;

    //propriedades de checkout
    public $name, $lastname, $province, $municipality, $street, $phone, $otherPhone,
    $email, $deliveryPrice =0,  $taxPayer,$otherAddress,$deliveryUrl;
    public $company, $latitude, $longitude, $referenceNumber, $paymentType, $bankAccount;

    protected $listeners = ["updateQuantity", "setLocation"];

    public function mount()
    {
        $this->paymentType = $this->getCompany()->payment_type;
        $this->deliveryType = $this->getCompany()->delivery_method;
    }

    public function render()
    {
        try {
            $company = $this->getCompany();
            $this->cartContent = CartFacade::getContent();
            $this->getTotal = CartFacade::getTotal();
            $this->getSubTotal = CartFacade::getSubTotal();
            $this->getTotalQuantity = CartFacade::getTotalQuantity();

            if ($company->delivery_method == "Entregadores PB") {
                $this->finalCompra = $this->getSubTotal + $this->localizacao;
            } else {
                $this->finalCompra = $this->getSubTotal;
            }

            $this->taxapb = ($this->finalCompra * 14) / 100;

            if ($company->payment_type == "Referência") {
                $this->totalFinal = $this->finalCompra + $this->taxapb;
            } else {
                $this->totalFinal = $this->finalCompra;
                $this->taxapb = 0;
            }

            $this->referenceNumber = rand(100000000, 999999999);
            $this->bankAccount = $this->bankAccountDetails();

            return view('livewire.site.shoppingcart', ['locations' => $this->getAllLocations()]);
        } catch (\Throwable $th) {
            
        }
    }

    public function bankAccountDetails()
    {
        return BankAccount::where('company_id', $this->getCompany()->id)->first();
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

    //logica para aplicar cupon de desconto
    public function cuponDiscount()
    {   
       try {
            $response = Http::withHeaders($this->getHeaders())
            ->post(env("LINK_KITUTES") . "/cupons",[
                "code"=>$this->code,
                "total"=>$this->totalFinal,
            ]);
            
            $cupon = collect(json_decode($response));
                
            if (isset($cupon['discount'])) {
                session()->put('discountvalue',$cupon['discount']);
                $this->code = "";
            }
       } catch (\Throwable $th) {
        //throw $th;
       }
    }
        
    public function checkout()
    {
        try {  
            if($this->getCompany()->payment_type == "Transferência") {
                $filaName = null;
                if ($this->receipt != null and !is_string($this->receipt)) {
                    $filaName = md5($this->receipt->getClientOriginalName())
                            .".".$this->receipt->getClientOriginalExtension();
                    $this->receipt->storeAs("public/recibos",$filaName);
                }  
            }
            //Acesso a API com um token
            $items = [];
            if (count(CartFacade::getContent()) > 0) {
                foreach(CartFacade::getContent() as $key => $item) {
                    array_push($items,[
                        "id"=>$item->id,
                        "name"=>$item->name,
                        "price"=>$item->price,
                        "quantity"=>$item->quantity,
                    ]);
                }
            }
            
            $data = [
                "clientName" => $this->name,
                "clientLastName" => $this->lastname,
                "province" => $this->province,
                "municipality" => $this->municipality,
                "street" => $this->street,
                "cupon" => "",
                "deliveryPrice" => 0,
                "phone" => $this->phone,
                "otherPhone" => $this->otherPhone,
                "email" => $this->email,
                "taxPayer" => $this->taxPayer,
                "paymentType" => "Referência",
                "receipt" => $filaName ?? null,
                "latitude" => $this->latitude,
                "longitude" => $this->longitude,
                "items" => $items,
            ];
            
            //Chamada a API
            $response = Http::withHeaders($this->getHeaders())
            ->post("https://kytutes.com/api/deliveries",$data)->json();

            $infoReference = [
                'amount' => $this->totalFinal,
                'referenceCode' => $this->referenceNumber,
            ];

            //$responsePayment = Http::post('http://192.168.100.29:8000/api/payment/website', $infoReference)->json();
            //$responsePayment = Http::post('https://fortcodedev.com/api/payment/website', $infoReference)->json();

            if ($response) {
            //if ($responsePayment != null) {
                Payment::create([
                    'reference' => $this->referenceNumber,
                    'value' => $this->totalFinal,
                    'status' => "pendente",
                    'typeservice' => "Pagamento de Encomenda",
                    'company_id' => $this->getCompany()->id
                ]);
            }

            CartFacade::clear();
            $this->reset([
                'name', 'lastname', 'province', 'municipality', 'street', 
                'phone', 'otherPhone', 'email', 'taxPayer', 'otherAddress',
                'latitude', 'longitude'
            ]);
    
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                'text'=>'Encomenda Finalizada'
            ]);

        } catch (\Throwable $th) {
            $this->alert("info", 
            [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                "Falha na encomenda"
            ]
        );
        }
    }
    
    public function remove($id)
    {
        try {
            $itenDelete = CartFacade::remove($id);
            $this->alert('success', '', [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                'text'=>'Item Eliminado'
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function updateQuantity($id, $quantity)
    {
        $idCart = CartFacade::get($id);

        $getItemCart = Http::withHeaders($this->getHeaders())
        ->get(env("LINK_KITUTES") . "/items?description=$idCart->name");

        $product = Collect(json_decode($getItemCart,true));

        if ((int)$quantity > $product[0]["quantity"]) {
          $this->alert('info', 'Informação', [
            'toast'=>false,
            'position'=>'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'OK',
            'text'=>'Quantidade indisponível'
          ]);
          $quantity = $product[0]["quantity"];
          $this->render();
          return;
        }else{
              CartFacade::update($id, [
                'quantity' => 1,
            ]);
        }
    }

 

    public function getAllLocations()
    {
        try {
            $response = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/locations");
            return Collect(json_decode($response, true));
        } catch (\Throwable $th) {
            //throw $th;Collect(json_decode($response, true))
        }
    }
    
    public function selectLocation($price)
    {
        $this->localizacao = $price;
    }

    public function setLocation($latitude, $longitude)
    {
        try {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            \Log::info("Geolocalização: $latitude, Longitude: $longitude");
        } catch (\Throwable $th) {
            return [];
        }
    }
}